<?php

namespace App\Models;

use App\Models\Concerns\HasModelScope;
use App\Models\Concerns\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    use HasModelScope;

    public $incrementing = false;

    public $observables = ['creating'];

    public const UPDATED_AT = null;

    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'address',
        'created_at',
        'updated_at',
    ];

    protected $casts = [];

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
