<?php

namespace App\Actions\UserBenchTime;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class StoreUserBenchTimeAction
{
    /**
     * @param $userBench
     * @param $data
     *
     * @return mixed
     */
    public function handle($userBench, $data)
    {
        foreach ($data as $datum) {
            $times = explode('-', $datum);

            $userBench->times()->create([
                'start' => Carbon::parse(Arr::first($times)),
                'end'   => Carbon::parse(Arr::last($times)),
            ]);
        }
    }
}
