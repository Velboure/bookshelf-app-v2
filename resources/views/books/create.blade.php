@extends('layout.app')

@section('content')

    <h1>Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label>Book Title</label>
        <input type="text" name="title" value="{{ old('title') }}"><br>
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

        <button type="submit">Add Book</button>
    </form>

@endsection
