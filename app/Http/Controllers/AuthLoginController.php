<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    public function login(Request $request)
    {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect('dashboaerd');
        }
        return redirect()->back()->withErrors(['email' => 'invalid Credential']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}