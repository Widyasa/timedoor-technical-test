<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = BookCategory::factory()->count(3000)->make();
        $chunks = $posts->chunk(300);
        $chunks->each(function ($chunk) {
            BookCategory::insert($chunk->toArray());
        });
    }
}
