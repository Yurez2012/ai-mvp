<?php

namespace App\Actions\UserBenches;

class DeleteUserBenchAction
{
    /**
     * @param $user
     *
     * @return mixed
     */
    public function handle($user)
    {
        return $user->benches()->delete();
    }
}
