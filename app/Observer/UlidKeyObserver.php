<?php

namespace App\Observer;

use App\Models\Product;
use Core\Units\Model;
use Illuminate\Support\Str;

class UlidKeyObserver
{
    public function creating(Model $model)
    {
        $model->id =  (string) Str::ulid() ;
    }
}
