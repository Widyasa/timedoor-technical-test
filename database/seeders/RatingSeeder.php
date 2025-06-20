<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $posts = Rating::factory()->count(500000)->make();
        $chunks = $posts->chunk(5000);
        $chunks->each(function ($chunk) {
            Rating::insert($chunk->toArray());
        });
    }
}
