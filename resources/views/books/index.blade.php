@extends('layout.app')

@section('content')
    <h1>Book Collection</h1>
    <p>browse and manage books in our database</p>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add NEW Book</a>

    <div class="book-grid">
        @foreach ($books as $book)
            <article class="card">
                <a href="{{ route('books.show', $book->id) }}" class="book-link">
                    <span class="tag">{{ $book->genre }}</span>
                    <img src="{{ $book->cover }}" alt="{{ $book->title }}">
                    <h2>{{ $book->title }}</h2>
                    <p>By {{ $book->author }}</p>
                </a>

                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
            </article>
        @endforeach
    </div>
@endsection