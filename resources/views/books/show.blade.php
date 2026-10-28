@extends('layouts.app')

@section('title', 'Перегляд книги')

@section('content')
    <div class="container" style="padding: 20px;">
        <h1>Детальна інформація про книгу</h1>

        <div style="background: #f9f9f9; padding: 15px; border: 1px solid #ddd; margin-bottom: 20px; border-radius: 4px;">
            <p><strong>ID:</strong> {{ $book->id }}</p>
            <p><strong>Назва:</strong> {{ $book->title }}</p>
            <p><strong>Автор:</strong> {{ $book->author }}</p>
            <p><strong>Рік видання:</strong> {{ $book->year }}</p>
            <p><strong>Кількість сторінок:</strong> {{ $book->pages }}</p>
            <p><strong>Жанр:</strong> {{ $book->genre }}</p>
            <p><strong>Створено в базі:</strong> {{ $book->created_at }}</p>
        </div>

        <a href="{{ route('books.index') }}" style="padding: 8px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Назад до списку</a>
        <a href="{{ route('books.edit', $book->id) }}" style="padding: 8px 15px; background: #ffc107; color: black; text-decoration: none; border-radius: 4px; margin-left: 10px;">Редагувати</a>
    </div>
@endsection
