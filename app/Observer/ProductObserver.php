<?php

namespace App\Observer;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->id = Str::ulid();
    }
}
