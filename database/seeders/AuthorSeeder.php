<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $posts = Author::factory()->count(1000)->make();
        $chunks = $posts->chunk(100);
        $chunks->each(function ($chunk) {
            Author::insert($chunk->toArray());
        });
    }


}
