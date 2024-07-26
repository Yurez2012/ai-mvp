<?php

namespace App\Http\Controllers\Programmer;

use App\Repositories\TechnologyRepository;

class ProfileController
{
    public function index(TechnologyRepository $technologyRepository)
    {
        $technologies = $technologyRepository->getForSelect();
        $skills       = auth()->user()->skills->toArray();

        return view('programmer.profile.index', [
            'technologies' => $technologies,
            'skills'       => $skills,
        ]);
    }
}
