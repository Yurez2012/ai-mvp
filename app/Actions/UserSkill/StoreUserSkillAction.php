<?php

namespace App\Actions\UserSkill;

use Illuminate\Support\Facades\Auth;

class StoreUserSkillAction
{
    /**
     * @param $user
     * @param $data
     *
     * @return mixed
     */
    public function handle($user, $data)
    {
        $user->skills()->delete();

        return $user->skills()->createMany($data);
    }
}
