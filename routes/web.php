<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BookController;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;
use App\Models\Genre;
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
Route::get('/search', [BookController::class, "search"])->name('search.books');

Route::get('/', function () {
    return view('main', [
        "userCount" => User::count() ?? 0,
        "genreCount" => Genre::count() ?? 0,
        "bookCount" => Book::count() ?? 0,
        "activeRentals" => Borrow::count() ?? 0,
        "genres" => Genre::all(),
    ]);
})->middleware('auth');

Route::post('/users', [ProjectController::class, "resister_store"])->name('users.store');
//Route::post('/users', [ProjectController::class, "addNewBook_store"])->name('books.store');

Route::get('/detail', [ProjectController::class, "detail"]);
Route::get('/resister', [ProjectController::class, "resister"]);
Route::post('/resister', [ProjectController::class, "resister_store"]);
Route::get('/login', [ProjectController::class, "login"]);
//Route::post('/login', 'AuthLoginController@logout');
Route::get('/addNewBook', [ProjectController::class, "addNewBook"])->name('books.store')->middleware('auth');
;
Route::get('/profile', function () {
    return view('projects.profile', [
        "name" => Auth::check() ? Auth::user()->name : "none",
        "email" => Auth::check() ? Auth::user()->email : "none",
        "role" => Auth::check() ? Auth::user()->librarian : "none",
    ]);
});
Route::get('/genres', [ProjectController::class, "list_genre"]);
Route::get('/genres/create', [ProjectController::class, "renderAddNewGenre"])->name('genres.renderAddNewGenre');
Route::delete('/genres/{id}', [ProjectController::class, "deleteGenre"])->name('genres.delete');
Route::get('/genres/edit/{id}', [ProjectController::class, "editGenre"])->name('genres.edit');
Route::put('/genres/edit/{id}', [ProjectController::class, "updateGenre"])->name('genres.update');
Route::post('/genres/edit/', [ProjectController::class, "insertGenre"])->name('genre.insert');
//Route::get('/books/{id}', [BookController::class, "listBooksByGenre"])->name('books.listBooksByGenre');
Route::get('/books/{id}/detail', [BookController::class, "detail"])->name('detail.book');
Route::get('/books/{id} ', [BookController::class, "listBooksByGenre"])->name('books.listBooksByGenre');
Route::get('/myRental', [BookController::class, "myRental"])->name("rental.list")->middleware('auth');
;
Route::get('/myRental/{id}', [BookController::class, "rentalDetail"])->name("rental.detail")->middleware('auth');
;
Route::post('/myRental/{id}', [RentalController::class, "update"])->name("rental.update")->middleware('auth');
;
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');