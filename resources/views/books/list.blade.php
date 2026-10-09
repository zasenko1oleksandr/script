@extends('layouts.app')

@section('title', 'Список літератури')

@section('content')
    <h1>Список літератури</h1>
    <p style="color: #555; margin-bottom: 25px;">
        Каталог наявної літератури в бібліотеці:
    </p>

    <div style="max-width: 600px; margin: 0 auto; text-align: left; background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
        <ul style="line-height: 2; margin: 0; padding-left: 20px;">
            <li><strong>Об'єктно-орієнтоване програмування в C++</strong> — Р. Лафоре</li>
            <li><strong>Чистий код (Clean Code)</strong> — Роберт Мартін</li>
            <li><strong>Шаблони проектування (Design Patterns)</strong> — Еріх Ґамма та ін.</li>
            <li><strong>Laravel: Up & Running</strong> — Метт Стаффер</li>
        </ul>
    </div>
@endsection
