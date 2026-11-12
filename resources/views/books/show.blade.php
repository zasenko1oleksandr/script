@extends('layouts.app')

@section('title', 'Перегляд книги')

@section('content')
    <div class="container" style="padding: 20px;">
        <h1>Деталі книги</h1>

        <div style="margin-bottom: 15px;">
            <strong>Назва книги:</strong> {{ $book->title }}
        </div>

        <!-- Виведення зв'язаних авторів (N:N) -->
        <div style="margin-bottom: 15px;">
            <strong>Автори:</strong>
            @if($book->authors->count() > 0)
                <ul>
                    @foreach($book->authors as $author)
                        <li>{{ $author->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>Авторів не вказано</p>
            @endif
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Рік видання:</strong> {{ $book->year }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Кількість сторінок:</strong> {{ $book->pages }}
        </div>

        <div style="margin-bottom: 15px;">
            <strong>Жанр:</strong> {{ $book->genre }}
        </div>

        <a href="{{ route('books.index') }}" style="padding: 8px 15px; background: #6c757d; color: white; text-decoration: none;">Назад до списку</a>
    </div>
@endsection
