@extends('layouts.app')

@section('title', 'Додати книгу')

@section('content')
    <div class="container" style="padding: 20px;">
        <h1>Додати нову книгу</h1>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="title">Назва книги:</label><br>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="author">Автор:</label><br>
                <input type="text" id="author" name="author" value="{{ old('author') }}" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="year">Рік видання:</label><br>
                <input type="number" id="year" name="year" value="{{ old('year') }}" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="pages">Кількість сторінок:</label><br>
                <input type="number" id="pages" name="pages" value="{{ old('pages') }}" required style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="genre">Жанр:</label><br>
                <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required style="width: 100%; padding: 8px;">
            </div>

            <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer;">Зберегти</button>
            <a href="{{ route('books.index') }}" style="margin-left: 10px;">Скасувати</a>
        </form>
    </div>
@endsection
