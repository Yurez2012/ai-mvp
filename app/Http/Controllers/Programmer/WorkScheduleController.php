<?php

namespace App\Http\Controllers\Programmer;

use App\Helpers\CalendarHelper;
use App\Repositories\TechnologyRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;

class WorkScheduleController
{
    public function index(TechnologyRepository $technologyRepository, UserRepository  $userRepository)
    {
        $data = $userRepository->getUserBenchesByUserId(auth()->user()->id, ['products.times', 'products.order.user'])->toArray();

        return view('programmer.profile.work_schedule', [
            'calendar' => CalendarHelper::getCalendarByYearAndMonth(2024, 8, [$data])
        ]);
    }
}
