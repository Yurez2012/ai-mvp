<?php

namespace App\Http\Controllers\Auth;

use App\Actions\User\StoreUserAction;
use App\Http\Requests\Auth\StoreUserRequest;

class RegisterController
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(StoreUserRequest $request, StoreUserAction $storeUserAction)
    {
        $storeUserAction->handle($request->all());

        return redirect()->to(route('login'));
    }
}
