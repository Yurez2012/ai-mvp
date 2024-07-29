<?php

namespace App\Http\Controllers\Programmer;

use App\Actions\UserSkill\StoreUserSkillAction;
use App\Http\Requests\Auth\StoreUserRequest;

class UserSkillController
{
    public function store($user, StoreUserRequest $userRequest, StoreUserSkillAction $userSkillAction)
    {
        $user = auth()->user();

        $userSkillAction->handle($user, $userRequest->get('skills'));

        return back();
    }
}
