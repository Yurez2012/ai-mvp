<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function index()
    {
        return view('pages.auth.auth');
    }

    public function store(LoginUserRequest $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            if(auth()->user()->type == 1) {
                return redirect()->route('benches');
            }

            if(auth()->user()->type == 2) {
                return redirect()->route('profile');
            }
        }

        return back();
    }

    public function delete()
    {
        Auth::logout();

        return redirect()->to(route('home'));
    }
}
