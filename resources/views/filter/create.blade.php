@extends('layouts.app')

@section('title', 'Додати мітку')

@section('content')
    <h1>Додати мітку</h1>

    <form method="POST" action="{{ route('filters.store') }}">
        @csrf
        @include('filter._form')
        <button type="submit">Зберегти</button>
    </form>

    <p>
        <a href="{{ route('filters.index') }}">Повернутися до списку</a>
    </p>
@endsection
