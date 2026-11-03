<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show(Book $book){
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }


public function store()
{
    $validated = request()->validate([
        'title' => ['required', 'string', 'max:150'],
        'author' => ['required', 'string', 'max:100'],
        'cover' => ['required', 'url', 'max:2048'],
        'genre' => ['nullable', 'string', 'max:100'],
    ]);

    Book::create($validated);

    return redirect()
        ->route('books.index')
        ->with('success', 'Book added successfully!');
    }
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }
    public function update(Book $book)
    {
        $validated = request()->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'cover' => ['required', 'url', 'max:2048'],
            'genre' => ['nullable', 'string', 'max:100'],
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.edit', 'book')
            ->with('success', 'Book updated successfully!');
    }

}