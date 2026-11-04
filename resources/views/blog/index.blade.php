@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список записів блогу</h1>

        <a href="{{ route('blog.create') }}" class="btn btn-success mb-3">Створити новий запис</a>

        @foreach($blogs as $blog)
            <div class="card mb-3">
                <div class="card-body">
                    <h3><a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a></h3>
                    <p>{{ $blog->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
