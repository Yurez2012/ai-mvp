<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\CalendarHelper;
use App\Repositories\TechnologyRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;

class CustomerWorkScheduleController
{
    public function index(TechnologyRepository $technologyRepository, UserRepository $userRepository)
    {
        $data = $userRepository->getUserBenchesByUserId(auth()->user()->id, ['orders.products.times', 'orders.products.user'])->toArray();

        return view('customer.work_schedule', [
            'calendar' => CalendarHelper::getCalendarByYearAndMonth(2024, 8, Arr::get($data, 'orders', []))
        ]);
    }
}
