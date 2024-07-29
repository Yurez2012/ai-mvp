<?php

namespace App\Actions\UserBenches;

class StoreUserBenchAction
{
    /**
     * @param $user
     * @param $data
     *
     * @return mixed
     */
    public function handle($user, $data)
    {
        return $user->benches()->create($data);
    }
}
