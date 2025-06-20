<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search_book) {
            return view('books.index', [
                'title' => 'E-Library | All Books Library',
                'books' => Book::select('books.*')
                    ->selectRaw('COALESCE(SUM(ratings.rating), 0) AS total_rating')
                    ->selectRaw('COALESCE(AVG(ratings.rating), 0) AS average_rating')
                    ->leftJoin('ratings', 'books.id', '=', 'ratings.books_id')
                    ->where('books.title', 'like', '%' . $request->search_book . '%')
                    ->orWhere('books.genre', 'like', '%' . $request->search_book . '%')
                    ->orWhereHas('category', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search_book . '%');
                    })->orWhereHas('author', function ($query) use ($request) {
                        $query->where('username', 'like', '%' . $request->search_book . '%');
                    })->groupBy('books.id')
                    ->orderByDesc('total_rating')
                    ->take($request->list_shown)
                    ->get(),
                'keyword' => $request,
            ]);
        }
        else {
            return view('books.index', [
                'title' => 'E-Library | All Books Library',
                'books' => Book::select('books.*')
                    ->selectRaw('COALESCE(SUM(ratings.rating), 0) AS total_rating')
                    ->selectRaw('COALESCE(AVG(ratings.rating), 0) AS average_rating')
                    ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
                    ->groupBy('books.id')
                    ->orderByDesc('total_rating')
                    ->paginate(10),
                // 'keyword' => '',
            ]);
        }
    }
}
