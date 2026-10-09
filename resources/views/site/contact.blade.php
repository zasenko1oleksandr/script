@extends('layouts.app')
@section('title', 'Заявка')
@section('content')
    <h1>Подача заявки</h1>
    <p>
        На цій сторінці може бути розміщена заявка про
        книгу, яку ви хотіли б додати.
    </p>
    <h1>Форма введення даних</h1>
    <form method="POST" action="{{ route('entry.store') }}">
        @csrf
        <div>
            <label for="name">Ім'я</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Надіслати</button>
    </form>
@endsection
