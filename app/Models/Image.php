<?php

namespace App\Models;

use Core\Casts\Enum;
use Core\Concerns\HasCreatedAtScope;
use Core\Concerns\HasUlid;
use Core\Units\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    use HasCreatedAtScope;

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

    /**
     * @return BelongsTo
     */
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
