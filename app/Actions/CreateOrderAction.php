<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class CreateOrderAction
{
    use AsAction;

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(array $ids): Model
    {
        try {
            $products = Product::query()->whereIn('id', $ids)->get();
            $total = $products->sum('price');

            foreach ($ids as $id) {
                $data = [
                    'product_id' => $id,
                    'user_id' => auth()->id(),
                    'price' => $total,
                    'notifyAdmin' => false,
                ];

                Product::query()->create($data);
            }

        } catch (\Exception $exception) {

            throw new \Exception('Creating Product Operation Has Error', 500);
        }
    }
}
