<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create() {
        return view('sessions.create');
    }

    public function store() { // attempt to authenticate and login user


        if (! auth()->attempt(
            request()->validate([
                'email' => 'required|email',
                'password' => 'required'
            ])

        )) {
            return back()->withInput()
                    ->withErrors(['email' => 'Incorrect Credentials. Try again.']);
        }
        else {
            session()->regenerate();
            return redirect('/')->with('success', 'Login Successful');
        }
 }
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Logout Successful');
    }
}
