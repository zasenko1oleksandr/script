<?php

namespace App\Queries;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookQuery
{
    public static function getFiltered(Request $request): LengthAwarePaginator
    {
        // 7. Використання with() та withCount() для попереднього завантаження та уникнення N+1
        $query = Book::with('authors')->withCount('authors');

        // 3. Пошук за назвою книги (основне поле) або ім'ям автора (пов'язане поле)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('authors', function ($authorQuery) use ($search) {
                        $authorQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // 4. Фільтрація за значенням із пов'язаної таблиці (випадаючий список авторів)
        if ($authorId = $request->input('author_id')) {
            $query->whereHas('authors', function ($q) use ($authorId) {
                $q->where('authors.author_id', $authorId);
            });
        }

        // 5. Сортування за полями (включно з кількістю пов'язаних записів)
        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'desc');

        if ($sortBy === 'authors_count') {
            $query->orderBy('authors_count', $sortOrder);
        } else {
            // Перевірка дозволених полів для безпеки
            $allowedSorts = ['id', 'title', 'year', 'pages'];
            if (in_array($sortBy, $allowedSorts)) {
                $query->orderBy($sortBy, $sortOrder);
            }
        }

        // 6. Пагінація зі збереженням параметрів
        return $query->paginate(5)->appends($request->query());
    }
}
