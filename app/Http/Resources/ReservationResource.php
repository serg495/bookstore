<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'book' => new BookResource($this->book),
            'count' => $this->count,
            'email' => $this->email,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
