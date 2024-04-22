<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function detail()
    {
        return view("projects.detail");
    }

    public function profile()
    {
        return view('projects.profile');
    }

    public function resister()
    {
        return view('projects.resister');
    }

    public function list_genre()
    {
        return view('projects.genre_list', [
            "genres" => Genre::all(),
        ]);
    }

    public function login()
    {
        return view('projects.login');
    }

    public function addNewbook()
    {
        return view('projects.addNewBook');
    }

    public function resister_store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            //'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password' => 'required',
            'is_librarian' => 'nullable|boolean',
            'email_verified_at' => date("YYYY-MM-DD HH:MM:SS"),
            'remember_token' => str_random(10),
        ], [
            'password.regex' => 'The password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character (@$!%*?&).',
        ]);
        User::create($validatedData); //save
        return redirect("/");
    }

    public function insertGenre(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark',
        ]);
        Genre::create($validatedData);

        return redirect("/genres");
    }

    public function deleteGenre($id)
    {
        // Find the genre by its ID
        $genre = Genre::find($id);
        // Delete the genre
        if ($genre) {
            $genre->delete();
        }
        redirect("/");

        // Redirect back with success message
        //return redirect()->back()->with('success', 'Genre deleted successfully.');
    }

    public function renderAddNewGenre()
    {
        return view("projects.addNewGenre");
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit', [
            "genre" => $genre,
        ]);
    }

    public function addNewBook_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'description' => 'nullable',
            'cover_image' => 'nullable|url',
            'in_stock' => 'required|integer|min:0', // Change min:0 to integer for in_stock
            'timestamps' => 'nullable', // Remove timestamps validation, as it's not needed here
            'pages' => 'required|integer|min:1', // Add integer validation for pages
            'language_code' => 'required',
            'id' => uniqid(),
            'released_at' => date("YYYY-MM-DD HH:MM:SS"),

            'isbn' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (findIsbn($value) === false) {
                        $fail('The ISBN is not valid.');
                    }
                },
                'unique:books,isbn'
            ],
        ], [
            'released_at.before' => 'The release date must be in the past.',
        ]);
        Book::create($validatedData); //save
        return redirect("/");
    }

    // Controller Method for Add New Genre Form
    public function createGenre()
    {
        return view('genres.create');
    }

    // Controller Method for Editing Genre
    public function editGenre($id)
    {
        $genre = Genre::find($id);
        // Ensure that the genre is found before passing it to the view
        if (!$genre) {
            // Handle the case where the genre is not found, perhaps redirecting to an error page
            return redirect()->route('error');
        }
        return view('genres.edit', compact('genre'));
    }

    // Controller Method for Storing New Genre
    public function storeGenre(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark',
        ]);

        Genre::create($validatedData);

        return redirect()->route('genres.index');
    }

    // Controller Method for Updating Genre
    public function updateGenre(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark',
        ]);

        $genre->update($validatedData);
        return redirect("/");
    }

    // Controller Method for Deleting Genre
    public function destroyGenre(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index');
    }


    function findIsbn($str)
    {
        $regex = '/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i';

        if (preg_match($regex, str_replace('-', '', $str), $matches)) {
            return (10 === strlen($matches[1]))
                ? 1   // ISBN-10
                : 2;  // ISBN-13
        }
        return false; // No valid ISBN found
    }
    function validateIsbn(Request $request)
    {
        $isbn = $request->input('isbn'); // Assuming 'isbn' is the input field name

        $result = findIsbn($isbn);

        if ($result === 1 && $result === 2) {
            return $isbn;
        } else {
            return "invalid ISBN";
        }
    }
}