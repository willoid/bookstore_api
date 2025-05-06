<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Alle Reviews für ein Buch anzeigen.
     */
    public function index(Book $book)
    {
        return response()->json($book->reviews);
    }

    /**
     * Neue Review für ein Buch speichern.
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review = $book->reviews()->create($request->all());

        return response()->json($review, 201);
    }

    /**
     * Bestimmte Review anzeigen.
     */
    public function show(Book $book, Review $review)
    {
        // Prüfen, ob die Review zu diesem Buch gehört
        if ($review->book_id !== $book->id) {
            return response()->json(['error' => 'Review gehört nicht zu diesem Buch'], 404);
        }

        return response()->json($review);
    }

    /**
     * Review aktualisieren.
     */
    public function update(Request $request, Book $book, Review $review)
    {
        // Prüfen, ob die Review zu diesem Buch gehört
        if ($review->book_id !== $book->id) {
            return response()->json(['error' => 'Review gehört nicht zu diesem Buch'], 404);
        }

        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($request->all());

        return response()->json($review);
    }

    /**
     * Review löschen.
     */
    public function destroy(Book $book, Review $review)
    {
        // Prüfen, ob die Review zu diesem Buch gehört
        if ($review->book_id !== $book->id) {
            return response()->json(['error' => 'Review gehört nicht zu diesem Buch'], 404);
        }

        $review->delete();

        return response()->json(null, 204);
    }
}
