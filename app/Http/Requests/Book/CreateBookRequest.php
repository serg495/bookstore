<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'title' => ['required', 'string', 'min:2', 'max:50'],
            'short_description' => ['required', 'string', 'min:20', 'max:250'],
            'amount' => ['required', 'integer', 'min:1', 'max:1000'],
        ];
    }
}
