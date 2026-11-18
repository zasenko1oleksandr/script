<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BookRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Queries\BookQuery;
class BookController extends Controller
{
    public function index(Request $request): View
    {
        // Отримуємо відфільтровані та відсортовані книги через Query-клас
        $books = BookQuery::getFiltered($request);

        // Отримуємо список авторів для випадаючого списку фільтра
        $authors = Author::all();

        // Повертаємо єдиний правильний результат
        return view('books.index', compact('books', 'authors'));
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
