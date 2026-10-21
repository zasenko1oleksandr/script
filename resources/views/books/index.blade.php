@extends('layouts.app')

@section('title', 'Заявка на книгу')

@section('content')
    <div style="text-align: center; padding: 40px 0;">
        <h1>Подача заявки</h1>
        <p style="margin-bottom: 25px; color: #555;">
            Натисніть кнопку нижче, щоб перейти до заповнення форми заявки на додавання книги.
        </p>

        <a href="{{ route('book-request.create') }}" style="display: inline-block; padding: 12px 28px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 6px; font-size: 16px; font-weight: bold;">
            Подати заявку
        </a>
    </div>
@endsection
