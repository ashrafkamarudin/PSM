<?php

namespace App\Http\Controllers;

use App\Circulation;
use App\Book;
use Session;
use Illuminate\Http\Request;

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
    }

    public function borrow()
    {
        $books = array(); // empty array
        return view('circulation.borrow')->withBooks($books); // return view with empty array
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
        //
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
    public function destroy(Circulation $circulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circulation  $circulation
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // find book in database
        if (Book::find($request->book_isbn) != NULL) {
            if ($request->session()->has('books')) { //if session is created

                // put all books data in session into $books
                $books = $request->session()->get('books');

                // initialize exist variable
                $exist = 0; // 0 because book is not yet found in array
                // loop through the array to find if book is already in the list or not
                foreach ($books as $book) {
                    if ($book == $request->book_isbn) {
                        $exist = 1;
                        //echo 'exist';
                    }
                }  

                if ($exist == 0) { // if book is not yet in array then add
                    $searchResult = Book::find($request->book_isbn);
        
                    if ($searchResult != NULL) {
                        // add book's isbn in array list
                        $request->session()->push('books', $request->book_isbn);
                    } else {
                        //echo 'Book not found';
                    }
                }
            } else { // if session is not yet created
                $request->session()->push('books', $request->book_isbn);
            }
        } else {
            //echo 'not found';
        }

        //dd($request->session()->get('books'));

        //if ($request->session()->has('books')) { //if session is created

            // put all books data in session into $books
            $booksInSession = $request->session()->get('books');

            $books = [];
            // loop through the array and find book in database based on isbn
            foreach ($booksInSession as $book) {
                $book = Book::find($book);
                array_push($books, $book);
            } 
        //}
        
        return view('circulation.borrow')->withBooks($books);

        //return redirect()->route('borrow');
        //$request->session()->flush();
    }
}
