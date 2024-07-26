<?php

namespace App\Actions\UserSkill;

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
