<?php

namespace App\Http\Controllers;

use App\Filters\AuthorsFilter;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorsController extends Controller
{
    /**
     * @var AuthorsService
     */
    private $authorsService;

    /**
     * @param AuthorsService $authorsService
     */
    public function __construct(AuthorsService $authorsService)
    {
        $this->authorsService = $authorsService;
    }

    /**
     * @param AuthorsFilter $filter
     * @return AnonymousResourceCollection
     */
    public function index(AuthorsFilter $filter): AnonymousResourceCollection
    {
        $authors = $this->authorsService->get($filter);

        return AuthorResource::collection($authors);
    }

    /**
     * @param Author $author
     * @return AuthorResource
     */
    public function show(Author $author): AuthorResource
    {
        return new AuthorResource($author);
    }

    /**
     * @param CreateAuthorRequest $request
     * @return AuthorResource
     */
    public function create(CreateAuthorRequest $request): AuthorResource
    {
        $author = $this->authorsService->create($request->validated());

        return new AuthorResource($author);
    }

    /**
     * @param Author $author
     * @param UpdateAuthorRequest $request
     * @return AuthorResource
     */
    public function update(Author $author, UpdateAuthorRequest $request): AuthorResource
    {
        $this->authorsService->update($author, $request->validated());

        return new AuthorResource($author);
    }

    public function destroy(Author $author): JsonResponse
    {
        $isDeleted = $this->authorsService->delete($author);

        return response()->json(['success' => $isDeleted]);
    }
}
