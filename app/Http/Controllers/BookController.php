<?php

namespace App\Http\Controllers;

use App\Book;
use Session;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('manage.books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'isbn' => 'required|max:12',
            'title' => 'required|max:255',
            'publisher' => 'required|max:255',
            'author' => 'required|max:100',
            'description' => 'sometimes|max:255'
        ]);

        //
        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->save();

        Session::flash('success', 'Successfully created the new '. $book->title . ' role in the database.');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        $book = Book::find($book)->first();
        //$book = Book::find('9780132350884')->first();

        //dd($book);

        return view("manage.books.show")->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        
        $book = Book::find($book)->first();
        return view("manage.books.edit")->withBook($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $book = Book::where('id', '=', $request->id)->first();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->save();

        Session::flash('success', 'Data berjaya diubah.');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book = Book::find($book->isbn);

        $book->delete();

        Session::flash('success', 'Data berjaya dipadam.');
        return redirect()->route('books.index');
    }
}
