<?php

namespace App\Actions\UserTime;

class StoreUserTimeAction
{
    /**
     * @param $user
     * @param $data
     *
     * @return mixed
     */
    public function handle($user, $data)
    {
        return $user->times()->createMany($data);
    }
}
