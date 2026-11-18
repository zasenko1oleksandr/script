<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BookRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()->orderBy('id', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request): RedirectResponse
    {
        $book = Book::create($request->safe()->except(['authors']));

        $book->authors()->sync($request->input('authors', []));

        return redirect()->route('books.index');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {

        $book->update($request->safe()->except(['authors']));

        $book->authors()->sync($request->input('authors', []));

        return redirect()->route('books.index');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
