@extends('layout.app')

@section('content')
    <h1>Book Collection</h1>
    <p>browse and manage books in our database</p>

    <div class="book-grid">
        @foreach ($books as $book)
        <a href="{{ route('books.show', $book->id) }}">
            <article class="card">
                <span class="tag">{{ $book->genre }}</span>
                <img src="{{ $book->cover }}" alt="{{ $book->title }}">
                <h2>{{ $book->title }}</h2>
                <p>By {{ $book->author }}</p>
            </article>
        @endforeach
    </div>
@endsection