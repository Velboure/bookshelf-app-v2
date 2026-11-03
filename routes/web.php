<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::redirect('/', '/books');

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');
// new/add book form
route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');

route::get('/books/edit/{book}', [BookController::class, 'edit'])
    ->name('books.edit');
    
route::put('/books/{book}', [BookController::class, 'update'])
    ->name('books.update');

Route::get('/books/{book}', [BookController::class, 'show'])
    ->name('books.show');

//store new book
route::post('/books', [BookController::class, 'store'])
    ->name('books.store');

