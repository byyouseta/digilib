<?php

namespace App\Http\Controllers;

use App\Book;
use App\Kategori;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        session()->put('ibu', 'Master');
        session()->put('anak', 'Master Books');

        $data = Book::all();
        $data2 = Kategori::all();

        return view('books', compact('data'));
    }
}
