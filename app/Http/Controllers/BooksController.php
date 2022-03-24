<?php

namespace App\Http\Controllers;

use App\Filters\BooksFilter;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BooksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BooksController extends Controller
{
    /**
     * @var BooksService
     */
    private $booksService;

    /**
     * @param BooksService $booksService
     */
    public function __construct(BooksService $booksService)
    {
        $this->booksService = $booksService;
    }

    /**
     * @param BooksFilter $filter
     * @return AnonymousResourceCollection
     */
    public function index(BooksFilter $filter): AnonymousResourceCollection
    {
        $books = $this->booksService->get($filter);

        return BookResource::collection($books);
    }

    /**
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    /**
     * @param CreateBookRequest $request
     * @return BookResource
     */
    public function create(CreateBookRequest $request): BookResource
    {
        $book = $this->booksService->create($request->validated());

        return new BookResource($book);
    }

    /**
     * @param Book $book
     * @param UpdateBookRequest $request
     * @return BookResource
     */
    public function update(Book $book, UpdateBookRequest $request): BookResource
    {
        $this->booksService->update($book, $request->validated());

        return new BookResource($book);
    }

    /**
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        $isDeleted = $this->booksService->delete($book);

        return response()->json(['success' => $isDeleted]);
    }
}
