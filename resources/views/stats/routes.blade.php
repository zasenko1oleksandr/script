@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <h2>Статистика популярності розділів бібліотеки</h2>

        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: left;">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Назва маршруту (Route Name)</th>
                <th>Кількість переглядів (Hits)</th>
                <th>Останній візит</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($stats as $row)
                <tr>
                    <td><code>{{ $row->route_name }}</code></td>
                    <td>{{ $row->hits }}</td>
                    <td>{{ $row->last_visit }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #777;">Дані відсутні</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
