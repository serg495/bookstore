<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class FilterBooksRequest extends FormRequest
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
            //
        ];
    }
}
