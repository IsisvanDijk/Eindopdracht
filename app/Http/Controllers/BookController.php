<?php
//php artisan route:list

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::all();

        // Start building the query for filtering and search
        $books = Book::query();

        // Apply search filter if provided
        if ($request->filled('search')) {
            $books->where('title', 'like', '%' . $request->input('search') . '%')
                ->orWhere('author', 'like', '%' . $request->input('search') . '%');
        }

        // Apply genre filter if provided
        if ($request->filled('genre_id')) {
            $books->where('genre_id', $request->input('genre_id'));
        }

        // Apply age category filter if provided
        if ($request->filled('age_category')) {
            $books->where('age_category', $request->input('age_category'));
        }

        // Apply author filter if provided
        if ($request->filled('author')) {
            $books->where('author', $request->input('author'));
        }

        // Get the filtered and searched books with genres
        $books = $books->with('genre')->get();

        return view('books.index', compact('books', 'genres'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            // If a user is not logged in and tries to enter the create, send back to index with error
            return redirect()->route('books.index')->with('error', 'You must be logged in to create a book.');
        }


        // Get logged in user
        $user = auth()->user();

        if ($user->viewed_books < 3) {
            return redirect()->route('books.index')->with('error', 'You must view at least 3 books before you can create one <3');
        }

        // Fetch all genres from the genres table
        $genres = Genre::all(); // Fetch all genres


//        $viewedBooks = session('viewed_books', []);
//
//        if (count($viewedBooks) < 3) {
//            return redirect()->route('books.index')->with('error', 'You must look at at least 3 books before you can create one <3');
//        }

        // Pass genres to the view
        return view('books.create', compact('genres'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'author' => 'required|string|max:255',
            'age_category' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required|string',
        ]);

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
     * @param string $id
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show(string $id)
    {
        $book= book::find($id);

        if (auth()->check()) {
            $user = auth()->user(); //get logged in user

            //add book to viewed books counter
            $user->increment('viewed_books');
        }

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        if (auth()->check() && $book->user_id === auth()->user()->id) {
            $genres = Genre::all();
            return view('books.edit', compact('book', 'genres'));
        } else {
            return redirect()->route('books.index');
        }

    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->user_id !== auth()->id()) {
            return redirect()->route('books.index')->with('error', 'You are not authorized to update this book.');
        }

        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'author' => 'required|string|max:255',
            'age_category' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required|string',
        ]);

        $book->update([
            'title' => $request->title,
            'image' => $request->image,
            'author' => $request->author,
            'age_category' => $request->age_category,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
        ]);

        // Redirect to details
        return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully!');
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
