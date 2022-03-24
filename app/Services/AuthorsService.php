<?php

namespace App\Services;

use App\Filters\AuthorsFilter;
use App\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorsService
{
    /**
     * @param AuthorsFilter $filter
     * @return LengthAwarePaginator
     */
    public function get(AuthorsFilter $filter): LengthAwarePaginator
    {
        return Author::with('books')
            ->filter($filter)
            ->paginate();
    }

    /**
     * @param array $data
     * @return Author
     */
    public function create(array $data): Author
    {
        return Author::create($data);
    }

    /**
     * @param Author $author
     * @param array $data
     * @return Author
     */
    public function update(Author $author, array $data): Author
    {
        $author->update($data);

        return $author;
    }

    /**
     * @param Author $author
     * @return bool
     */
    public function delete(Author $author): bool
    {
        return $author->delete();
    }
}
