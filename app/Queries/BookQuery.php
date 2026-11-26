<?php

namespace App\Queries;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookQuery
{
    public static function getFiltered(Request $request): LengthAwarePaginator
    {
        $query = Book::with('authors')->withCount('authors');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('authors', function ($authorQuery) use ($search) {
                        $authorQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($authorId = $request->input('author_id')) {
            $query->whereHas('authors', function ($q) use ($authorId) {
                $q->where('authors.author_id', $authorId);
            });
        }

        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'desc');

        if ($sortBy === 'authors_count') {
            $query->orderBy('authors_count', $sortOrder);
        } else {
            $allowedSorts = ['id', 'title', 'year', 'pages'];
            if (in_array($sortBy, $allowedSorts)) {
                $query->orderBy($sortBy, $sortOrder);
            }
        }

        return $query->paginate(5)->appends($request->query());
    }
}
