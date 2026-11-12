<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter_name' => ['required', 'string', 'max:100'],
            'filter_description' => ['nullable', 'string'],
        ];
    }
}
