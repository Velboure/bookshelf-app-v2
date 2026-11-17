<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('publisher')->paginate(5);


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
        'cover' => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:2048'],
        'genre' => ['nullable', 'string', 'max:100'],
        'publisher_id' => ['required', 'exists:publishers,id'],

    ]);

    if (request()->hasFile('cover')) {
        $cover = request()->file('cover')->store('covers', 'public');
        
    }
    $validated['cover'] = $cover;
    
    Book::create($validated);

    return redirect()
        ->route('books.index')
        ->with('success', 'Book added successfully!');
    }
    public function edit(Book $book)
    {
         $publishers = Publisher::all();

         return view('books.edit', compact('book', 'publishers'));
    }
    public function update(Book $book)
    {
        $validated = request()->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'cover' => ['required', 'image','mimes:jpeg,png,gif,webp', 'max:2048'],
            'genre' => ['nullable', 'string', 'max:100'],
            'publisher_id' => ['required', 'exists:publishers,id'],
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.edit', 'book')
            ->with('success', 'Book updated successfully!');
    }

   public function destroy(Book $book){
    Storage::disk('public')->delete($book->cover);
    $book->delete();
    return redirect()
        ->route('books.index')
        ->with('success', 'Book deleted successfully!');
   }


}