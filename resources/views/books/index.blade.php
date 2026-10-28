@extends('layouts.app')

@section('title', 'Список літератури')

@section('content')
    <div class="container" style="padding: 20px;">
        <h1>Список літератури</h1>

        <a href="{{ route('books.create') }}" class="btn btn-primary" style="margin-bottom: 15px; display: inline-block; padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px;">Додати нову книгу</a>

        <table class="table" border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Назва</th>
                <th>Автор</th>
                <th>Рік</th>
                <th>Сторінок</th>
                <th>Жанр</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">Переглянути</a> |
                        <a href="{{ route('books.edit', $book->id) }}">Редагувати</a> |
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Ви впевнені?')">Видалити</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Список книг порожній.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Пункт 10: Пагінація -->
        <div style="margin-top: 20px;">
            {{ $books->links() }}
        </div>
    </div>
@endsection
