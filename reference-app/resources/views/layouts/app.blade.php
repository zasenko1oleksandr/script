<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Лабораторний практикум')</title>
</head>
<body>

<nav style="display: flex; justify-content: center; gap: 25px; padding: 15px 0;">
    <a href="{{ url('/') }}">Головна</a>
    <a href="{{ url('/about') }}">Про застосунок</a>
    <a href="{{ url('/contact') }}">Контакти</a>
</nav>

<main style="text-align: center; margin-top: 30px;">
    @yield('content')
</main>

<footer style="text-align: center; margin-top: 50px; color: #6c757d;">
    &copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського
</footer>

</body>
</html>
