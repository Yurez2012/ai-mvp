<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\TechnologyRepository;

class CustomerWorkScheduleController
{
    public function index(TechnologyRepository $technologyRepository)
    {
        return view('customer.work_schedule');
    }
}
