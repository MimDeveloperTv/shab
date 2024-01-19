<?php

namespace App\Actions;

//use App\Exceptions\ServerErrorException;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class CreateProductAction
{
    use AsAction;

    /**
     * Execute the action.
     * @throws Throwable
     */
    public function handle(string $title,float $price): array
    {
        try {

            $data = [
                'user_id'=> auth()->id(),
                'title' => $title,
                'price' => $price,
            ];

       return Product::query()->create()->toArray($data);

        } catch (\Exception $exception) {

            return [
                'message' => $exception->getMessage(),
            ];
        }
    }
}
