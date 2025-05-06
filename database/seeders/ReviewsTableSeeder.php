<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        // Für jedes Buch einige Reviews erstellen
        $books = Book::all();

        foreach ($books as $book) {
            // 3-7 Reviews pro Buch
            $reviewCount = rand(3, 7);

            for ($i = 0; $i < $reviewCount; $i++) {
                Review::create([
                    'book_id' => $book->id,
                    'reviewer_name' => 'Leser ' . ($i + 1),
                    'rating' => rand(1, 5),
                    'comment' => 'Dies ist ein Beispielkommentar für das Buch ' . $book->title
                ]);
            }
        }
    }
}
