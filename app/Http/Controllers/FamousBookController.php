<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class FamousBookController extends Controller
{
    public function index() {
        return view('famousBooks.index', [
            'title' => 'E-Library | Most Famous Author',
            'authors' => Author::select('authors.*')
                ->selectRaw('COALESCE(SUM(ratings.rating), 0) as total_rating')
                ->join('books', 'authors.id', '=', 'books.author_id')
                ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
                ->groupBy('authors.id')
                ->orderByDesc('total_rating')
                ->limit(10)
                ->get(),
        ]);
    }
}
