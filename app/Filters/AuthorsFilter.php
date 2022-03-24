<?php

namespace App\Filters;

use App\Http\Requests\Author\FilterAuthorsRequest;

class AuthorsFilter extends QueryFilter
{
    public function __construct(FilterAuthorsRequest $request)
    {
        parent::__construct($request);
    }
}
