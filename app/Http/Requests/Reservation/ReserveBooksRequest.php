<?php

namespace App\Http\Requests\Reservation;

use App\Rules\IsExistsEnoughCountOfBooks;
use Illuminate\Foundation\Http\FormRequest;

class ReserveBooksRequest extends FormRequest
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
            'count' => ['required', 'integer', 'min:1', 'max:50', new IsExistsEnoughCountOfBooks],
            'email' => ['required', 'string', 'email'],
        ];
    }
}
