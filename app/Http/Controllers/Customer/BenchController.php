<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\UserRepository;

class BenchController
{
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->getBenchesList([
            'skills',
        ]);

        return view('customer.benches', [
            'users' => $users
        ]);
    }
}
