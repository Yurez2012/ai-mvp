<?php

namespace App\Http\Controllers\Customer;

use App\Actions\Order\StoreOrderAction;
use App\Actions\OrderProduct\StoreOrderProductAction;
use App\Actions\UserBenches\DeleteUserBenchAction;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;

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
        DeleteUserBenchAction   $deleteUserBenchAction,
        UserRepository          $userRepository
    )
    {

        $data = $userRepository->getUserBenchesByUserId(auth()->user()->id, ['benches.times'])->toArray();

        $order = $storeOrderAction->handle([
            'user_id' => auth()->user()->id,
        ]);

        $storeOrderProductAction->handle($order, Arr::get($data, 'benches'));

        $deleteUserBenchAction->handle(auth()->user());

        return redirect()->to(route('order'));
    }
}
