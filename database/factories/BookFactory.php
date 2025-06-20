<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->city(),
            'author_id' => function () {
                $author = Author::inRandomOrder()->first();
                return $author ? $author->id : null;
            },
            'book_category_id' => function(){
                $bookCategory = BookCategory::inRandomOrder()->first();
                return $bookCategory ? $bookCategory->id : null;

            },
            'genre' =>fake()->city(),
            'language'=>fake()->country(),
            'description'=>fake()->text(50),
        ];
    }
}
