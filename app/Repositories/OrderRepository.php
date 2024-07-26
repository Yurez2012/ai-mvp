<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends Repository
{
    /**
     * @var
     */
    public $model;

    /**
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getOrderAuthUser($relation = [])
    {
        return $this->model
            ->with($relation)
            ->where('user_id', auth()->user()->id)
            ->get();
    }
}
