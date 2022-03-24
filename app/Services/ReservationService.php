<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationService
{
    /**
     * @param Book $book
     * @param array $data
     * @return Reservation
     */
    public function reserve(Book $book, array $data): Reservation
    {
        return DB::transaction(function () use ($book, $data) {
            $book->update(['amount' => $book->amount - (int)$data['count']]);

            return Reservation::query()->create($data + ['book_id' => $book->id]);
        });
    }
}
