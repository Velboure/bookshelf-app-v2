@extends('layout.app')

@section('content')

    <h1>Edit New Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Book Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}"><br>
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Author</label>
        <input type="text" name="author" value="{{ old('author') }}"><br>
        @error('author')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Cover URL</label>
        <input type="url" name="cover" value="{{ old('cover') }}"><br>
        @error('cover')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Genre</label>
        <input type="text" name="genre" value="{{ old('genre') }}"><br>
        @error('genre')
            <p class="error">{{ $message }}</p>
        @enderror
        

        <button type="submit">Update Book</button>
    </form>

@endsection
