<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // In app/Http/Controllers/API/BookController.php
// Die index-Methode ändern:

    public function index(Request $request)
    {
        $query = Book::with(['author', 'category']);

        // Nach Kategorie filtern
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Nach Autor filtern
        if ($request->has('author_id')) {
            $query->where('author_id', $request->author_id);
        }

        // Nach Mindestbewertung filtern
        if ($request->has('min_rating')) {
            $minRating = $request->min_rating;
            $query->whereHas('reviews', function ($q) use ($minRating) {
                $q->select('book_id')
                    ->groupBy('book_id')
                    ->havingRaw('AVG(rating) >= ?', [$minRating]);
            });
        }

        // Sortieren
        if ($request->has('sort_by')) {
            $sortField = $request->sort_by;
            $sortDirection = $request->sort_direction ?? 'asc';

            if ($sortField === 'rating') {
                // Nach Durchschnittsbewertung sortieren
                $books = $query->get();
                if ($sortDirection === 'desc') {
                    $books = $books->sortByDesc(function ($book) {
                        return $book->averageRating();
                    });
                } else {
                    $books = $books->sortBy(function ($book) {
                        return $book->averageRating();
                    });
                }
                return response()->json($books->values()->all());
            } else {
                // Nach anderen Feldern sortieren
                $query->orderBy($sortField, $sortDirection);
            }
        }

        $books = $query->get();

        // Durchschnittsbewertung hinzufügen
        $books->each(function ($book) {
            $book->average_rating = $book->averageRating();
        });

        return response()->json($books);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
