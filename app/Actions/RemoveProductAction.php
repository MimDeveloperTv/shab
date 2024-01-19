<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class RemoveProductAction
{
    use AsAction;

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(string $id): JsonResponse
    {
        $product = Product::query()->find($id);
        $response = Gate::inspect('productRemove', $product);

        if ($response->allowed()) {

            return response()->json(
                ['deleted' => Product::query()->find($id)->delete()]);
        } else {
            return response()->json($response->message());
        }
    }
}
