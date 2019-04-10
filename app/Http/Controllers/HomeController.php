<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use LaraFlash;
use App\Book;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LaraFlash::add()->content('Hello World')->priority(6)->type('Info');
        LaraFlash::snackbar('Click to continue')->priority(3);
        LaraFlash::success("Yay it worked!");
        LaraFlash::danger('Oops Something went wrong!');

        $books = Book::paginate(10);
        return view('welcome')
            ->withBooks($books);
    }

    public function borrow()
    {
        $books = [];
        return view('circulation.borrow')->withBooks($books);
    }

    public function return()
    {
        return view('circulation.return');
    }

    public function checkIn()
    {
        return view('checkin');
    }
}
