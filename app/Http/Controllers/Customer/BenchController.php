<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\Benches\IndexBenchRequest;
use App\Repositories\TechnologyRepository;
use App\Repositories\UserRepository;

class BenchController
{
    public function index(IndexBenchRequest $request, UserRepository $userRepository, TechnologyRepository $technologyRepository)
    {
        $filter = $request->validated();

        $users = $userRepository->getBenchesList(
            ['skills'],
            $filter
        );

        $technologies = $technologyRepository->getForSelect();

        return view('customer.benches', [
            'users'        => $users,
            'technologies' => $technologies,
        ]);
    }
}
