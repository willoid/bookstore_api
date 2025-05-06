<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Science Fiction',
                'description' => 'Books that explore futuristic concepts and alternate realities.',
            ],
            [
                'name' => 'Romance',
                'description' => 'Stories centered around love and relationships.',
            ],
            [
                'name' => 'Mystery',
                'description' => 'Novels with suspense and twists around a central crime or puzzle.',
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Books featuring magical worlds and mythical beings.',
            ],
            [
                'name' => 'Historical Fiction',
                'description' => 'Fictional stories set in real historical settings.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
