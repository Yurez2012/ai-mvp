<?php

namespace App\Http\Controllers\Customer;

use App\Actions\UserBenches\StoreUserBenchAction;
use App\Repositories\UserRepository;

class BenchBookingController
{
    public function __invoke($benches_booking, UserRepository $userRepository, StoreUserBenchAction $storeUserBenchAction)
    {
        $storeUserBenchAction->handle(auth()->user(), [
            'programmer_id' => $benches_booking
        ]);

        return back();
    }
}
