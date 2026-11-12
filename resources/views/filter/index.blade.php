@extends('layouts.app')

@section('title', 'Довідник міток')

@section('content')
    <h1>Довідник міток</h1>
    <p>
        <a href="{{ route('filters.create') }}">Додати мітку</a>
    </p>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>Назва</th>
            <th>Опис</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($filters as $i => $filter)
            <tr>
                <td>{{ $filters->firstItem() + $i }}</td>
                <td>{{ $filter->filter_name }}</td>
                <td>{{ $filter->filter_description }}</td>
                <td>
                    <a href="{{ route('filters.edit', $filter) }}">Редагувати</a>
                    <form method="POST" action="{{ route('filters.destroy', $filter) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Видалити мітку?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $filters->links() }}
@endsection
