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

