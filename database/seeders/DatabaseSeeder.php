<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AuthorSeeder::class);
        $this->call(BookCategorySeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(RatingSeeder::class);
    }
}
