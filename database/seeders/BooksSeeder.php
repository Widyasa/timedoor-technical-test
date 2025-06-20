<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

require_once 'vendor/autoload.php';

class BooksSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $posts = Book::factory()->count(10000)->make();
        $chunks = $posts->chunk(500);
        $chunks->each(function ($chunk) {
            Book::insert($chunk->toArray());
        });

    }
}
