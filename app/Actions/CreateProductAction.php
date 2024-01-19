<?php

namespace App\Actions;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class CreateProductAction
{
    use AsAction;

    /**
     * Execute the action.
     * @throws Throwable
     */
    public function handle(string $title,float $price): Model
    {
        try {

            $data = [
                'user_id'=> auth()->id(),
                'title' => $title,
                'price' => $price,
            ];

       return Product::query()->create($data);

        } catch (\Exception $exception) {

           throw new \Exception('Creating Product Operation Has Error',500);
        }
    }
}
