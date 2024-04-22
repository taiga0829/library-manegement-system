<?php

namespace App\Http\Controllers;


use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Carbon\Carbon;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $criteria = $request->query('criteria');
        $query = $request->query('query');

        // Retrieve books from the database based on the provided criteria and query
        $books = Book::all()
            ->where($criteria, '=', $query);

        return view('books.search_results', compact('books', 'query'));
    }
    public function detail($id)
    {
        $id = (int) $id;
        $book = Book::find($id);
        return view('books.detail', [
            "book" => $book
        ]);
    }

    public function listBooksByGenre($id)
    {
        // Fetch books belonging to the given genre ID
        $books = Book::where('genre_id', $id)->get();

        // Fetch the genre based on the ID
        $genre = Genre::find($id);

        // Pass both books and genre to the view
        return view("books.listBookByGenre", compact("books", "genre"));
    }

    public function myRental()
    {
        // Fetch rental requests with PENDING status
        $pendingRentals = Borrow::where('status', 'PENDING')->get();

        // Fetch accepted and in-time rentals (before the deadline)
        $acceptedInTimeRentals = Borrow::where('status', 'ACCEPTED')
            ->where('deadline', '>', Carbon::now())
            ->get();

        // Fetch other rental lists similarly

        return view('books.my_rental', compact('pendingRentals', 'acceptedInTimeRentals' /* Add other rental lists as needed */));
    }

    public function rentalDetail($id)
    {
        $rental = Borrow::find($id);
        return view("borrow.detail", compact("rental"));
    }

   
}