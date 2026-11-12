@extends('layouts.app')

@section('content')
    <div class="container">
        <article class="blog-post">
            <h1>{{ $blog->title }}</h1>

            <p class="text-muted">
                <strong>Категорія:</strong> {{ $blog->category->name ?? 'Без категорії' }} |
                <strong>Автор:</strong> {{ $blog->author->name ?? 'Невідомо' }} |
                <strong>Дата публікації:</strong> {{ $blog->dt_created }}
            </p>

            <div class="tags">
                @forelse ($blog->filters as $filter)
                    <span class="tag">
    {{ $filter->filter_name }}
    </span>
                @empty
                    <span>Міток немає.</span>
                @endforelse
            </div>

            <hr>

            <div class="blog-body">
                {!! nl2br(e($blog->text)) !!}
            </div>
        </article>

        <div class="mt-4">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">← Назад до списку</a>

            @auth
                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-primary">Редагувати</a>

                <form action="{{ route('blog.destroy', $blog) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити цей запис?')">Видалити</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
