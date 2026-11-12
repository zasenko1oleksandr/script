<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,author_id',
            'year' => ['required', 'integer', 'min:1000', 'max:2026'],
            'pages' => ['required', 'integer', 'min:1'],
            'genre' => ['required', 'string', 'max:100'],
        ];
    }
}
