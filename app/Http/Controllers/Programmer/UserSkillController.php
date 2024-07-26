<?php

namespace App\Http\Controllers\Programmer;

use App\Actions\UserSkill\StoreUserBenchAction;
use App\Http\Requests\Auth\StoreUserRequest;
use Illuminate\Http\Request;

class UserSkillController
{
    public function store($user, StoreUserRequest $userRequest, StoreUserBenchAction $userSkillAction)
    {
        $user = auth()->user();

        $userSkillAction->handle($user, $userRequest->get('skills'));

        return back();
    }
}
