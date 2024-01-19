<?php

namespace App\Observer;

use Core\Units\Model;
use Illuminate\Support\Str;

class UlidKeyObserver
{
    public function creating(Model $model)
    {
        $model->id = (string) Str::ulid();
    }
}
