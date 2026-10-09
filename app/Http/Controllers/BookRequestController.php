<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;
use App\Models\Book;

class BookRequestController extends Controller
{

    public function list()
    {
        $books = Book::all();

        return view('books.list', compact('books'));
    }


    public function index()
    {
        return view('books.index');
    }


    public function create()
    {
        return view('books.create');
    }


    public function store(EntryRequest $request)
    {
        $validated = $request->validated();


        Book::create([
            'title' => $validated['book_title'],
        ]);

        return view('books.confirm', [
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'book_title' => $validated['book_title'],
            'message'    => $validated['message'],
        ]);
    }
}
