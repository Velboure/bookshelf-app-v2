<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;


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
    $publishers = Publisher::all();

    return view('books.create', compact('publishers'));
}


public function store()
{
    $validated = request()->validate([
        'title' => ['required', 'string', 'max:150'],
        'author' => ['required', 'string', 'max:100'],
        'cover' => ['required', 'url', 'max:2048'],
        'genre' => ['nullable', 'string', 'max:100'],
        'publisher_id' => ['required', 'exists:publishers,id'],

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
            'publisher_id' => ['required', 'exists:publishers,id'],
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.edit', 'book')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully!');
    }


}