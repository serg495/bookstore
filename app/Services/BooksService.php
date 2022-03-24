<?php

namespace App\Services;

use App\Filters\BooksFilter;
use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BooksService
{
    /**
     * @param BooksFilter $filter
     * @return LengthAwarePaginator
     */
    public function get(BooksFilter $filter): LengthAwarePaginator
    {
        return Book::with('author')
            ->filter($filter)
            ->paginate();
    }

    /**
     * @param array $data
     * @return Book
     */
    public function create(array $data): Book
    {
        return Book::create($data);
    }

    /**
     * @param Book $book
     * @param array $data
     * @return Book
     */
    public function update(Book $book, array $data): Book
    {
        $book->update($data);

        return $book;
    }

    /**
     * @param Book $book
     * @return bool
     */
    public function delete(Book $book): bool
    {
        return $book->delete();
    }
}
