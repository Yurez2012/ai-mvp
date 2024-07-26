<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * @var
     */
    public $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getBenchesList($relation = [])
    {
        return $this->model
            ->with($relation)
            ->whereNotIn('id', auth()->user()->benches->pluck('programmer_id')->toArray())
            ->where('type', 2)
            ->get();
    }
}
