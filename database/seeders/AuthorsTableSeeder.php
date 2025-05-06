<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $authors = [
                [
                    'name' => 'Jane Austen',
                    'biography' => 'Jane Austen was an English novelist known primarily for her six major novels.',
                    'birth_date' => '1775-12-16',
                ],
                [
                    'name' => 'George Orwell',
                    'biography' => 'George Orwell was an English novelist, essayist, journalist and critic.',
                    'birth_date' => '1903-06-25',
                ],
                [
                    'name' => 'Haruki Murakami',
                    'biography' => 'Haruki Murakami is a Japanese writer known for his surreal and melancholic novels.',
                    'birth_date' => '1949-01-12',
                ],
                [
                    'name' => 'Chimamanda Ngozi Adichie',
                    'biography' => 'Chimamanda is a Nigerian writer and feminist, known for works like "Americanah".',
                    'birth_date' => '1977-09-15',
                ],
                [
                    'name' => 'Gabriel García Márquez',
                    'biography' => 'García Márquez was a Colombian novelist, a key figure in magic realism.',
                    'birth_date' => '1927-03-06',
                ],
            ];

            foreach ($authors as $author) {
                Author::create($author);
            }
        }
    }
}
