@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')
    <h1>Адміністрування блогу</h1>
    <p>
        <a href="{{ route('blog.create') }}">
            Додати запис
        </a>
    </p>
    <table>
        <thead>
        <tr>
            <th>№</th>

            {{-- Сортування за Заголовком (title) --}}
            @php
                $currentSort = request('sort');
                $nextSortTitle = $currentSort === 'title' ? '-title' : 'title';
            @endphp
            <th>
                <a href="{{ route('blog.admin', array_merge(request()->except('sort', 'page'), ['sort' => $nextSortTitle])) }}">
                    Заголовок
                    @if ($currentSort === 'title') ↑ @elseif ($currentSort === '-title') ↓ @endif
                </a>
            </th>

            {{-- Сортування за Категорією (categoryName) --}}
            @php
                $nextSortCategory = $currentSort === 'categoryName' ? '-categoryName' : 'categoryName';
            @endphp
            <th>
                <a href="{{ route('blog.admin', array_merge(request()->except('sort', 'page'), ['sort' => $nextSortCategory])) }}">
                    Категорія
                    @if ($currentSort === 'categoryName') ↑ @elseif ($currentSort === '-categoryName') ↓ @endif
                </a>
            </th>

            <th>Мітки</th>

            {{-- Сортування за Датою (created / date) --}}
            @php
                $nextSortDate = $currentSort === 'created' ? '-created' : 'created';
            @endphp
            <th>
                <a href="{{ route('blog.admin', array_merge(request()->except('sort', 'page'), ['sort' => $nextSortDate])) }}">
                    Дата
                    @if ($currentSort === 'created') ↑ @elseif ($currentSort === '-created') ↓ @endif
                </a>
            </th>

            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($blogs as $i => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('blog.show', $blog) }}">
                        {{ $blog->title }}
                    </a>
                </td>
                <td>
                    {{ $blog->category?->category_name ?? '—' }}
                </td>
                <td>
                    @forelse ($blog->filters as $filter)
                        <span class="tag">
                            {{ $filter->filter_name }}
                        </span>
                    @empty
                        —
                    @endforelse
                </td>
                <td>
                    {{ $blog->dt_created->format('d.m.Y') }}
                </td>
                <td>
                    <a href="{{ route('blog.edit', $blog) }}">
                        Редагувати
                    </a>
                    <form method="POST"
                          action="{{ route('blog.destroy', $blog) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Записів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection
