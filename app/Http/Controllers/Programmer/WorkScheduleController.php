<?php

namespace App\Http\Controllers\Programmer;

use App\Repositories\TechnologyRepository;

class WorkScheduleController
{
    public function index(TechnologyRepository $technologyRepository)
    {
        return view('programmer.profile.work_schedule');
    }
}
