<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\OrderRepository;

class OrderController
{
    public function index(OrderRepository $orderRepository)
    {
        $orders = $orderRepository->getOrderAuthUser(['products']);

        return view('customer.order', [
            'orders' => $orders
        ]);
    }

    public function store()
    {

    }
}
