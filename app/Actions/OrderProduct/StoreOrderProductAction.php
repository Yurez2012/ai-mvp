<?php

namespace App\Actions\OrderProduct;

use Illuminate\Support\Arr;

class StoreOrderProductAction
{
    /**
     * @param       $order
     * @param array $data
     *
     * @return void
     */
    public function handle($order, array $data)
    {
        foreach ($data as $datum) {
            $product = $order->products()->create([
                'programmer_id' => Arr::get($datum, 'programmer_id'),
            ]);

            $product->times()->createMany(Arr::get($datum, 'times'));
        }
    }
}
