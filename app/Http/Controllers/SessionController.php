<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.log-in');
    }

    public function store()
    {
        //validate

        $attributes = \request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //attempt to log in

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Credentials do not match. Please try again.'
            ]);
        };


        //regenerate session token

        \request()->session()->regenerate();

        //redirect

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/register');
    }
}
