<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        //create user
        $attributes =

        //log user in

        auth()->login(User::create(
            request()->validate([
                'name' => ['required', 'max:255'],
                'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'], //format as email
                'password' => ['required', 'min:7', 'max:255']
            ])
        ));

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
