<?php

namespace App\Actions\Order;

use App\Models\Order;

class StoreOrderAction
{
    /**
     * @param array $data
     *
     * @return bool
     */
    public function handle(array $data)
    {
        return Order::create($data);
    }
}
