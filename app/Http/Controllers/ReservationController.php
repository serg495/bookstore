<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\ReserveBooksRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Book;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    /**
     * @var ReservationService
     */
    private $reservationService;

    /**
     * @param ReservationService $reservationService
     */
    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * @param Book $book
     * @param ReserveBooksRequest $request
     * @return ReservationResource
     */
    public function __invoke(Book $book, ReserveBooksRequest $request): ReservationResource
    {
        $reservation = $this->reservationService->reserve($book, $request->validated());

        return new ReservationResource($reservation);
    }
}
