<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    /**
     * @param array $credentials
     *
     * @return bool
     */
    public function handle(array $credentials)
    {
        return Auth::attempt($credentials);
    }
}
