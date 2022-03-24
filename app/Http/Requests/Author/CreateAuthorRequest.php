<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50'],
        ];
    }
}
