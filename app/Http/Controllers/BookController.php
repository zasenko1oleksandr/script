<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View
    {
        // Пункт 10: Реалізація пагінації (по 5 записів на сторінку)
        $books = Book::query()->orderBy('id', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->validated());
        return redirect()->route('books.index');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
