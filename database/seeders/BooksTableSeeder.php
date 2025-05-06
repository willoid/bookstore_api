<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Pride and Prejudice',
                'description' => 'A romantic novel about manners and matrimonial machinations.',
                'author_id' => Author::where('name', 'Jane Austen')->value('id'),
                'category_id' => Category::where('name', 'Romance')->value('id'),
                'price' => 1299,
                'stock' => 12,
            ],
            [
                'title' => '1984',
                'description' => 'A dystopian novel set in a totalitarian society ruled by Big Brother.',
                'author_id' => Author::where('name', 'George Orwell')->value('id'),
                'category_id' => Category::where('name', 'Science Fiction')->value('id'),
                'price' => 1499,
                'stock' => 20,
            ],
            [
                'title' => 'Kafka on the Shore',
                'description' => 'A surreal and imaginative novel that blends reality and metaphysics.',
                'author_id' => Author::where('name', 'Haruki Murakami')->value('id'),
                'category_id' => Category::where('name', 'Fantasy')->value('id'),
                'price' => 1799,
                'stock' => 8,
            ],
            [
                'title' => 'Americanah',
                'description' => 'A powerful story of love, race, and identity across continents.',
                'author_id' => Author::where('name', 'Chimamanda Ngozi Adichie')->value('id'),
                'category_id' => Category::where('name', 'Historical Fiction')->value('id'),
                'price' => 1399,
                'stock' => 10,
            ],
            [
                'title' => 'Love in the Time of Cholera',
                'description' => 'A story of unrequited love spanning decades in the Caribbean.',
                'author_id' => Author::where('name', 'Gabriel García Márquez')->value('id'),
                'category_id' => Category::where('name', 'Romance')->value('id'),
                'price' => 1599,
                'stock' => 5,
            ],
            [
                'title' => 'Norwegian Wood',
                'description' => 'A poignant coming-of-age story infused with nostalgia and loss.',
                'author_id' => Author::where('name', 'Haruki Murakami')->value('id'),
                'category_id' => Category::where('name', 'Romance')->value('id'),
                'price' => 1499,
                'stock' => 7,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
