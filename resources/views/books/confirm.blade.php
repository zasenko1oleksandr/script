@extends('layouts.app')

@section('title', 'Дані прийнято')

@section('content')
    <h1>Дані прийнято</h1>
    <p style="color: #555; margin-bottom: 20px;">Ви ввели такі дані:</p>

    <div style="max-width: 400px; margin: 0 auto; text-align: left; background: #ffffff; padding: 20px 25px; border-radius: 8px; border: 1px solid #e5e7eb; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
            <li><strong>Ім'я:</strong> {{ $name }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Назва книги:</strong> {{ $book_title }}</li>
            <li><strong>Повідомлення:</strong> {{ $message }}</li>
        </ul>
    </div>

    <p style="margin-top: 25px;">
        <a href="{{ route('book-request.index') }}" style="color: #0d6efd; text-decoration: none; font-weight: bold;">
            ← Повернутися до сторінки заявки
        </a>
    </p>
@endsection
