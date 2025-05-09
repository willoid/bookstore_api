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

    public function index(Request $request)
    {
        $books = Book::with(['author', 'category'])->get();

        // Add filter function
        // $query = Book::query();

        // Alle Bücher mit Autor und Kategorie laden
       // $query = Book::with(['author', 'category']);

        // Nach Kategorie filtern
        /*if ($request->has('category_id')) {
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
        });*/
        return response()->json($books);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'published_year' => 'nullable|integer',
            'stock' => 'required|integer|min:0',
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //$book->load(['author', 'category', 'reviews.user']);
        //$book->average_rating = $book->averageRating();

        //return response()->json($book)

        return response()->json($book)->load(['author', 'category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'published_year' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);
        $book->update($request->all());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
