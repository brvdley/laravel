<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create() {
        return view('sessions.create');
    }

    public function store() { // attempt to authenticate and login user
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Incorrect Credentials. Try again.'
            ]);
        }

        session()->regenerate();
            return redirect('/')->with('success', 'Login Successful');
 }
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Logout Successful');
    }
}
