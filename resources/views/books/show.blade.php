@extends('layout.app')

@section('content')
    <span class="tag">{{ $book->genre }}</span>
    <h1 class="book-title">{{ $book->title }}</h1>
    <p>By {{ $book->author }}</p>
    <img src="{{ $book->cover }}" alt="{{ $book->title }}">
    <p>{{ $book->description }}</p>
@endsection