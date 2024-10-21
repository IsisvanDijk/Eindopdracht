<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PostController extends Controller
{ public function show()
    {
        // Get the currently authenticated user's books
        $books = book::where('user_id', auth()->id())->get();

        // Pass the books to the view
        return view('/my-posts', compact('books'));
    }

}
