<?php

namespace App\Filters;

use App\Http\Requests\Author\FilterAuthorsRequest;

class AuthorsFilter extends QueryFilter
{
    public function __construct(FilterAuthorsRequest $request)
    {
        parent::__construct($request);
    }

    public function search(string $value)
    {
        $this->getQuery()
            ->where('firstname', 'like', "%{$value}%")
            ->orWhere('lastname', 'like', "%{$value}%");
    }

    public function firstname(string $value)
    {
        $this->getQuery()->where('firstname', 'like', "%{$value}%");
    }

    public function lastname(string $value)
    {
        $this->getQuery()->where('firstname', 'like', "%{$value}%");
    }
}
