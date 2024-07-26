<?php

namespace App\Actions\User;

use App\Models\User;

class StoreUserAction
{
    /**
     * @param array $data
     *
     * @return void
     */
    public function handle(array $data)
    {
        return User::create($data);
    }
}
