<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ReviewController;

// Bestehende Routen...

// Neue verschachtelte Routen für Reviews
Route::apiResource('books.reviews', ReviewController::class);

Route::apiResource('books', BookController::class);

Route::apiResource('authors', AuthorController::class);

Route::apiResource('categories', CategoryController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'Wingapo World!']);
});
