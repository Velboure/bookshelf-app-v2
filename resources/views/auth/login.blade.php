@extends('layout.app')
@section('content')
    <h1>Manager Login</h1>

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required><br>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Password</label>
        <input type="password" name="password" required><br>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <button>Login</button>
    </form>
@endsection 