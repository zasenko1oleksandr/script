@extends('layouts.app')

@section('title', 'Дані прийнято')

@section('content')
    <h1>Дані прийнято</h1>
    <p>Ви ввели такі дані:</p>
    <ul>
        <li><strong>Ім'я:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Назва книги:</strong> {{ $book_title }}</li>
    </ul>

    <p style="margin-top: 20px;">
        <a href="{{ route('book-request.index') }}">
            Повернутися до сторінки заявки
        </a>
    </p>
@endsection
