@extends('layouts.app')

@section('title', 'Список літератури')

@section('content')
    <div class="container" style="padding: 20px;">
        <h1>Список літератури</h1>

        <a href="{{ route('books.create') }}" class="btn btn-primary" style="margin-bottom: 15px; display: inline-block; padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px;">Додати нову книгу</a>

        <form method="GET" action="{{ route('books.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Пошук за назвою або автором..." class="form-control" style="padding: 6px; flex: 1; min-width: 200px;">

            <select name="author_id" class="form-control" style="padding: 6px;">
                <option value="">Усі автори</option>
                @foreach($authors as $author)
                    <option value="{{ $author->author_id }}" {{ request('author_id') == $author->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>

            <select name="sort_by" class="form-control" style="padding: 6px;">
                <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Сортувати за ID</option>
                <option value="year" {{ request('sort_by') == 'year' ? 'selected' : '' }}>Сортувати за роком</option>
                <option value="authors_count" {{ request('sort_by') == 'authors_count' ? 'selected' : '' }}>Сортувати за кількістю авторів</option>
            </select>

            <select name="sort_order" class="form-control" style="padding: 6px;">
                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>За спаданням</option>
                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>За зростанням</option>
            </select>

            <button type="submit" class="btn btn-primary" style="padding: 6px 12px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Шукати</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary" style="padding: 6px 12px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Скинути</a>
        </form>

        <table class="table" border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Назва</th>
                <th>Автори</th>
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

                    <td>
                        {{ $book->authors->pluck('name')->implode(', ') }}
                    </td>

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

        <div style="margin-top: 20px;">
            {{ $books->links() }}
        </div>
    </div>
@endsection
