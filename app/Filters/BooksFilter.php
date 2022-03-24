<?php

namespace App\Filters;

use App\Http\Requests\Book\FilterBooksRequest;

class BooksFilter extends QueryFilter
{
    public function __construct(FilterBooksRequest $request)
    {
        parent::__construct($request);
    }
}
