<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'author' => (string) $this->author->name,
            'amount' => $this->amount,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
