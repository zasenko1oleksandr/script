<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'База даних бібліотеки')</title>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0; font-family: sans-serif; background-color: #f8f9fa;">

<nav style="display: flex; justify-content: center; gap: 20px; padding: 15px; background: #ffffff; border-bottom: 1px solid #ddd;">
    <a href="{{ url('/') }}" style="color: #0d6efd; text-decoration: none; font-weight: bold;">Головна сторінка</a>
    <a href="{{ url('/book-request/list') }}" style="color: #0d6efd; text-decoration: none; font-weight: bold;">Список літератури</a>
    <a href="{{ route('/book-request/index') }}" style="color: #0d6efd; text-decoration: none; font-weight: bold;">Заявка</a>
</nav>

<main style="flex: 1; text-align: center; padding: 40px 20px;">
    @yield('content')
</main>

<footer style="text-align: center; padding: 15px; background: #e9ecef; border-top: 1px solid #ccc; font-size: 14px;">
    <p style="margin-bottom: 5px;"><strong>Тема ДКР:</strong> Реалізація бази даних бібліотеки</p>
    <p style="margin: 0;">&copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського | Виконав: Засенко О. Л., гр. РІ-п51</p>
</footer>

</body>
</html>
