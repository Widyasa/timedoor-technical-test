<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index() {
        return view('ratings.index', [
            'title' => 'E-Library | Rating Author',
            'books' => Book::with(['author', 'bookCategory'])->latest()->get(),
        ]);
    }

    public function searchBook($id)
    {
        $books = Book::where('author_id', $id)->get();

        return response()->json(['books' => $books]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|integer',
            'rating' => 'required|integer',
        ]);

        $rating = Rating::create($validatedData);

        if ($rating) {
            return redirect(route('rating'))->with('success', 'Successfully to Add New Rating!');
        } else {
            return redirect(route('rating'))->with('failed', 'Failed to Add New Rating!');
        }
    }
}
