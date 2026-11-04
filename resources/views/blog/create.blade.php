@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Створити новий запис блогу</h1>

        <form action="{{ route('blog.store') }}" method="POST">
            @csrf

            @include('blog._form')

            <button type="submit" class="btn btn-success mt-3">Створити</button>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-3">Скасувати</a>
        </form>
    </div>
@endsection
