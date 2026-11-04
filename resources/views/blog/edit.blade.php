@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редагувати запис блогу</h1>

        <form action="{{ route('blog.update', $blog) }}" method="POST">
            @csrf
            @method('PUT')

            @include('blog._form')

            <button type="submit" class="btn btn-primary mt-3">Зберегти зміни</button>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-3">Скасувати</a>
        </form>
    </div>
@endsection
