@extends('layout.app')

@section('content')
    <h1>Book Collection</h1>
    <p>Browse and manage books in our database</p>

    <a href="{{ route('books.create') }}" class="btn btn-primary">Add NEW Book</a>

    <div class="book-grid">
        @foreach ($books as $book)
            <article class="card">
                <a href="{{ route('books.show', $book->id) }}" class="book-link">
                    <span class="tag">{{ $book->genre }}</span>
                    <img src="{{ $book->cover }}" alt="{{ $book->title }}">
                    <h2>{{ $book->title }}</h2>
                    <p>By {{ $book->author }}</p>
                    <p>Publisher: {{ $book->publisher->name ?? 'No Publisher' }}</p>
                </a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="danger">Delete</button>
                </form>
            </article>
        @endforeach
    </div>
@endsection
