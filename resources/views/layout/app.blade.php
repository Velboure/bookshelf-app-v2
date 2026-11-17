<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshelf</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <header class="container site-header">
        <a href="{{ route('books.index') }}">Bookshelf</a>

        <div>
        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest

        @auth
            <p>Hello,{{ auth()->user()->name }}</p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
</body>
</html> 