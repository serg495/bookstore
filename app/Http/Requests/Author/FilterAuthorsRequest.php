<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class FilterAuthorsRequest extends FormRequest
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
            'search' => ['string', 'max:50'],
            'firstname' => ['string', 'max:50'],
            'lastname' => ['string', 'max:50'],
        ];
    }
}
