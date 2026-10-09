<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email'],
            'book_title' => ['required', 'string', 'max:255'],
            'message'    => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'       => 'Поле «Ім\'я» не може бути порожнім.',
            'email.required'      => 'Поле «Email» не може бути порожнім.',
            'email.email'         => 'Email введено некоректно.',
            'book_title.required' => 'Поле «Назва книги» не може бути порожнім.',
            'book_title.string'   => 'Назва книги повинна бути текстом.',
            'book_title.max'      => 'Назва книги не повинна перевищувати 255 символів.',
            'message.required'    => 'Поле «Повідомлення» не може бути порожнім.',
            'message.string'      => 'Повідомлення повинно бути текстом.',
        ];
    }
}
