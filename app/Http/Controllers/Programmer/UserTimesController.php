<?php

namespace App\Http\Controllers\Programmer;

use App\Actions\UserTime\StoreUserTimeAction;
use App\Http\Requests\UserTime\StoreUserTimeRequest;
use App\Repositories\TechnologyRepository;

class UserTimesController
{
    public function index(TechnologyRepository $technologyRepository)
    {
        $times = auth()->user()->times;

        return view('programmer.profile.time', [
            'times' => $times,
        ]);
    }

    public function store(StoreUserTimeRequest $storeUserTimeRequest, StoreUserTimeAction $storeUserTimeAction)
    {
        $storeUserTimeAction->handle(auth()->user(), $storeUserTimeRequest->get('times'));

        return back();
    }
}
