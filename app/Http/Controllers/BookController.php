<?php
//php artisan route:list

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::all();

        $books = Book::query();

        if ($request->filled('genre_id')) {
            $books->where('genre_id', $request->input('genre_id'));
        }

        $books = $books->with('genre')->get();

        return view('books.index', compact('books', 'genres'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all genres from the genres table
        $genres = Genre::all(); // Fetch all genres

        // Pass genres to the view
        return view('books.create', compact('genres'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();

        $book->title = $request->input(key: 'title');
        $book->image = $request->input(key: 'image');
        $book->author = $request->input(key: 'author');
        $book->age_category = $request->input(key: 'age_category');
        $book->genre_id = $request->input(key: 'genre_id');
        $book->description = $request->input(key: 'description');
        $book->user_id = auth()->user()->id;

        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book= book::find($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('books.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
