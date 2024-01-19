<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductRemovePolicy
{
    public function productRemove(User $user, Product $product)
    {
        return $product->user_id === $user->id
            ? Response::allow()
            : Response::deny('You do not own this product');
    }
}
