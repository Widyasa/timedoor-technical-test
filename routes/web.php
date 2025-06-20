<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FamousBookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return redirect('/books');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books');
    // Route::get('/books', 'search')->name('books.search');
});

Route::controller(FamousBookController::class)->group(function () {
    Route::get('/most-famous-author', 'index')->name('famous-author');
});

Route::controller(RatingController::class)->group(function () {
    Route::get('/rating', 'index')->name('rating');
    Route::get('/rating/author/{id}', 'searchBook')->name('rating.search');
    Route::post('/rating/store', 'store')->name('rating.store');
});
