<?php

namespace App\Models;

use App\Models\Concerns\HasModelScope;
use App\Models\Concerns\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    use HasModelScope;

    public $incrementing = false;

    public $observables = ['creating'];

    public const UPDATED_AT = null;

    protected $fillable = [
        'id',
        'user_id',
        'price',
        'notifyAdmin',
        'created_at',
        'updated_at',
    ];

    protected $casts = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
