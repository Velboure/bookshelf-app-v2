<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        // verify the credentials and log in the user

        if (Auth::attempt($credentials)) {
          throw ValidationException::withMessages([
                 'email' => 'The email or password is incorrect.',
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(route('books.index'));
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('books.index')->with('success', 'You have been logged out.');
    }
}
