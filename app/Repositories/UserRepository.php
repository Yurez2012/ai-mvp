<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;

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
    public function getBenchesList($relation = [], $filter)
    {
        $query = $this->model
            ->with($relation)
            ->where('type', 2)
            ->whereHas('times');

        if (count(Arr::get($filter, 'technologies', [])) > 0) {
            $query->whereHas('skills', function ($query) use ($filter) {
                $query->whereIn('technology_id', Arr::get($filter, 'technologies'));
            });
        }

        if (Arr::has($filter, 'date_start') && Arr::get($filter, 'date_start')) {
            $query->whereHas('times', function ($query) use ($filter) {
                $query->whereDate('start', '>=', Arr::get($filter, 'date_start'));
            });
        }


        if (Arr::has($filter, 'date_end') && Arr::get($filter, 'date_end')) {
            $query->whereHas('times', function ($query) use ($filter) {
                $query->whereDate('end', '<=', Arr::get($filter, 'date_end'));
            });
        }

        return $query->get();
    }
}
