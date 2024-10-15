<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Logged users posted books
    Route::get('/my-posts', [PostController::class, 'show'])->name('posts');
});

// List page
Route::get('/list', [ListController::class, 'index'])->name('list');

// Detail page (met een dynamische id)
Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail');


Route::resource('/books', BookController::class);


require __DIR__.'/auth.php';
