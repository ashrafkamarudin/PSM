<?php

namespace App\Http\Controllers;

use App\Circulation;
use App\CirculationHistory;
use App\Book;
use App\Student;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CirculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Circulation::with('book')->paginate(10);

        //dd($books);
        return view('manage.circulation.index')->withBooks($books);
    }

    /**
     * Display interface for circulation borrow
     *
     * @return \Illuminate\Http\Response
     */
    public function borrow()
    {
        // initialize empty list
        $books = [];
        session(['circulation_status' => 'borrow']);

        // check if status is borrow or not
        if (session()->get('circulation_status') == 'borrow') {
            if (session()->has('books')) { //if session is created
                $booksInSession = session()->get('books');
            
                // loop through the array and find book in database based on isbn
                foreach ($booksInSession as $book) {
                    $book = Book::find($book);
                    array_push($books, $book);
                } 
            }
        } else {
            // reset books in session
            $this->circulationReset();
        }
        
        return view('circulation.borrow')->withBooks($books); // return view with empty array
    }

    /**
     * Display interface for circulation return
     *
     * @return \Illuminate\Http\Response
     */
    public function return()
    {
        // initialize empty list
        $books = [];
        session(['circulation_status' => 'return']);

        // check if status is return or not
        if (session()->get('circulation_status') == 'return') {
            if (session()->has('books')) { //if session is created
                $booksInSession = session()->get('books');
            
                // loop through the array and find book in database based on isbn
                foreach ($booksInSession as $book) {
                    $book = Book::find($book);
                    array_push($books, $book);
                } 
            }
        } else {
            // reset books in session
            $this->circulation_reset();
        }
        
        return view('circulation.return')->withBooks($books); // return view with empty array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // initialize
        $bookCount = 0;
        $books = collect();

        $student = Student::find($request->std_ic);

        if ($student == null) {

            Session::flash('error', 'Maklumat Pelajar tidak dijumpai. Sila cuba sekali lagi.');

            return redirect()->route('circulation.borrow');
        } else {   
            if (session()->has('books')) { //if session is created
                $booksInSession = session()->get('books');
                
                // loop through the array and find book in database based on isbn
                foreach ($booksInSession as $bookIsbn) {

                    $books->push(Book::find($bookIsbn)->first());
        
                    $circulation = new Circulation();
                    $circulation->isbn = $bookIsbn;
                    $circulation->std_ic = $request->std_ic;
                    $circulation->staff = auth()->user()->id;
                    $circulation->save();
        
                    $bookCount++;
                } 
            }
        
            // clear books in session
            //$this->circulationReset();
        
            Session::flash('success', $bookCount . ' buku berjaya dipinjam.');
        }

        return redirect()->route('circulation.borrowReceipt')
            ->withStudent($student)
            ->withBooks($books);
    }

    /**
     * Display a borrow receipt and listing of books borrowed.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrowReceipt()
    {
        //
        if (session()->get('student') !== NULL && session()->get('books') !==NULL) {
            $student = session()->get('student');
            $books = session()->get('books');
            
            return view('circulation.borrow-receipt')
                ->withStudent($student)
                ->withBooks($books);
        } else {
            return redirect()->route('circulation.borrow');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function show(Circulation $circulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Circulation $circulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circulation $circulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        //
        $bookCount = 0;
        $books = collect();
        
        if (session()->has('books')) { //if session is created
            $booksInSession = session()->get('books');
            
            // loop through the array and find book in database based on isbn
            foreach ($booksInSession as $bookIsbn) {
                $books->push(Book::find($bookIsbn)->first());

                $circulation = Circulation::find($bookIsbn);
                $circulation->delete();

                //dd($circulation);

                $circulationHistory = new CirculationHistory();
                $circulationHistory->isbn = $circulation->isbn;
                $circulationHistory->std_ic = $circulation->std_ic;
                $circulationHistory->staff = $circulation->staff;
                $circulationHistory->save();

                $bookCount++;
            } 
        }

        // clear books in session
        $this->circulationReset();

        Session::flash('success', $bookCount . ' buku berjaya dipulang.');
        //return redirect()->route('circulation.return');
        return redirect()->route('circulation.returnReceipt')
            ->withBooks($books);
    }

    /**
     * Display a borrow receipt and listing of books borrowed.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnReceipt()
    {
        //
        if (session()->get('books') !==NULL) {
            $books = session()->get('books');
            
            return view('circulation.return-receipt')
                ->withBooks($books);
        } else {
            return redirect()->route('circulation.return');
        }
    }

    /**
     * search for book to borrow from table book
     *
     * @return \Illuminate\Http\Response
     */
    public function searchForBorrow(Request $request)
    {
        session(['std_ic' => trim($request->std_ic)]);

        // update circulation status
        //session(['circulation_status' => $request->circulation_status]);

        // find book in database
        if (Book::find($request->book_isbn) != NULL) {
            if (Circulation::find($request->book_isbn) != NULL) {
                Session::flash('error', 'Buku sudah dipinjam');
            } else {
                $this->saveBooksInSession($request);
            }
        } else {
            Session::flash('error', 'Buku tidak dijumpai. Sila cuba sekali lagi.');
        }
        
        //return view('circulation.borrow')->withBooks($books);
        return $this->routeRedirect();
        //return redirect()->route(session()->get('circulation_status'));
        //$request->session()->flush();
    }

    /**
     * search for book to return from table circulation
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function searchForReturn(Request $request)
    {

        // find book in database
        if (Circulation::find($request->book_isbn) != NULL) {
            $this->saveBooksInSession($request);
        } else {
            Session::flash('error', 'Buku tidak dijumpai');
        }
        
        //return view('circulation.borrow')->withBooks($books);
        return $this->routeRedirect();
        //return redirect()->route(session()->get('circulation_status'));
        //$request->session()->flush();
    }

    /**
     * Reset session for book listing and std_ic
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function circulationReset()
    {
        //reset session item
        if (session()->has('books')) { //if session is created
            session()->forget('books'); // forget session
        }

        if (session()->has('std_ic')) { //if session is created
            session()->forget('std_ic'); // forget session
        }

        return $this->routeRedirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function saveBooksInSession(Request $request)
    {
        if (session()->has('books')) { //if session is created

            // put all books data in session into $books
            $books = session()->get('books');

            // initialize exist variable
            $exist = 0; // 0 because book is not yet found in array
            // loop through the array to find if book is already in the list or not
            foreach ($books as $book) {
                if ($book == $request->book_isbn) {
                    $exist = 1;
                    //echo 'exist';
                    Session::flash('warning', 'Buku sudah ditambah');
                }
            }  

            if ($exist == 0) { // if book is not yet in array then add
                $searchResult = Book::find($request->book_isbn);
    
                if ($searchResult != NULL) {
                    // add book's isbn in array list
                    session()->push('books', $request->book_isbn);
                } 
            }
        } else { // if session is not yet created
            session()->push('books', $request->book_isbn);
        }
    }

    /**
     * Redirect back to either route circulation.borrow or circulation.return.
     *
     * @return \Illuminate\Http\Response
     */
    public function routeRedirect()
    {
        return redirect()->route('circulation.' . session()->get('circulation_status'));
    }


}
