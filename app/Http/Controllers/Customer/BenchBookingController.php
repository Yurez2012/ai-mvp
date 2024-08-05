<?php

namespace App\Http\Controllers\Customer;

use App\Actions\UserBenches\StoreUserBenchAction;
use App\Actions\UserBenchTime\StoreUserBenchTimeAction;
use App\Http\Requests\BenchBooking\StoreBenchBookingRequest;
use Illuminate\Support\Arr;

class BenchBookingController
{
    public function store(
        StoreBenchBookingRequest $request,
        StoreUserBenchAction     $storeUserBenchAction,
        StoreUserBenchTimeAction $storeUserBenchTimeAction
    )
    {
        $data = $request->validated();

        $userBench = $storeUserBenchAction->handle(auth()->user(),
            ['programmer_id' => Arr::get($data, 'bench_id')]
        );

        $storeUserBenchTimeAction->handle($userBench, Arr::get($data, 'period', []));

        return back();
    }
}
