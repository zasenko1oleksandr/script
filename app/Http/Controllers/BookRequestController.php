<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;

class BookRequestController extends Controller
{

    public function list()
    {
        return view('books.list');
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

        return view('books.confirm', [
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'book_title' => $validated['book_title'],
            'message'    => $validated['message'],
        ]);
    }
}
