<?php

namespace App\Repositories;

use App\Models\Technology;

class TechnologyRepository extends Repository
{
    /**
     * @var
     */
    public $model;

    /**
     * @param Technology $model
     */
    public function __construct(Technology $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getForSelect()
    {
        return $this->model
            ->select('id', 'technology')
            ->get()
            ->pluck('technology', 'id')
            ->toArray();
    }
}
