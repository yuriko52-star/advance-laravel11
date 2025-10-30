<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        // $items = Book::all();
        $items = Book::with('author')->get();
        return view('book.index', ['items' => $items]);
    }
    public function add() {
        return view('book.add');
    }
    public function create(Request $request) {
        $form = $request->validate(Book::$rules);
        // $this->validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect ('/book');
    }
}
