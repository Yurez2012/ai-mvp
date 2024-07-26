<?php

namespace App\Http\Controllers\Customer;

use App\Actions\Order\StoreOrderAction;
use App\Actions\OrderProduct\StoreOrderProductAction;
use App\Actions\UserSkill\DeleteUserBenchAction;

class PaymentController
{
    public function index()
    {
        return view('customer.payment');
    }

    public function store
    (
        StoreOrderAction        $storeOrderAction,
        StoreOrderProductAction $storeOrderProductAction,
        DeleteUserBenchAction   $deleteUserBenchAction
    )
    {

        $data = auth()->user()->benches->toArray();

        $order = $storeOrderAction->handle([
            'user_id' => auth()->user()->id
        ]);

        $storeOrderProductAction->handle($order, $data);

        $deleteUserBenchAction->handle(auth()->user());

        return redirect()->to(route('order'));
    }
}
