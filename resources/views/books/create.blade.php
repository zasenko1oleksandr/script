@extends('layouts.app')

@section('title', 'Форма введення даних')

@section('content')
    <h1>Форма введення даних</h1>

    <form method="POST" action="{{ route('book-request.store') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name">Ім'я</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
            @error('name')
            <p class="error" style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >
            @error('email')
            <p class="error" style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="book_title">Назва книги</label>
            <input
                type="text"
                id="book_title"
                name="book_title"
                value="{{ old('book_title') }}"
            >
            @error('book_title')
            <p class="error" style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <label for="message">Повідомлення / Примітка</label>
            <textarea id="message" name="message">{{ old('message') }}</textarea>
            @error('message')
            <p class="error" style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Надіслати</button>
    </form>
@endsection
