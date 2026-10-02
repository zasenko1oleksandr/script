<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Лабораторний практикум')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0; font-family: sans-serif;">

<nav style="display: flex; justify-content: center; gap: 20px; padding: 15px;">
    <a href="{{ url('/') }}">Головна</a>
    <a href="{{ url('/about') }}">Список Літерарути</a>
    <a href="{{ url('/contact') }}">Контакти</a>
</nav>

<main style="flex: 1; text-align: center; padding: 20px;">
    @yield('content')
</main>

<footer style="text-align: center; padding: 15px; background: #f1f1f1; border-top: 1px solid #ccc;">
    <p style="margin-bottom: 5px;"><strong>Тема ДКР:</strong> Реалізація бази даних бібліотеки</p>
    <p style="margin: 0;">&copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського | Виконав: Засенко О. Л., гр. РІ-п51</p>
</footer>

</body>
</html>
