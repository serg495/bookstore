<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BooksController::class, 'index']);
    Route::get('{book}', [BooksController::class, 'show']);
    Route::put('{book}', [BooksController::class, 'update']);
    Route::post('/', [BooksController::class, 'create']);
    Route::delete('{book}', [BooksController::class, 'delete']);

    Route::post('{book}/reserve', ReservationController::class);
});


Route::group(['prefix' => 'authors'], function () {
    Route::get('/', [AuthorsController::class, 'index']);
    Route::get('/{author}', [AuthorsController::class, 'show']);
    Route::put('/{author}', [AuthorsController::class, 'update']);
    Route::post('/', [AuthorsController::class, 'create']);
    Route::delete('/{author}', [AuthorsController::class, 'delete']);
});


