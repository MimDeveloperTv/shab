<?php

namespace App\Models;

use Core\Concerns\HasCreatedAtScope;
use Core\Concerns\HasUlid;
use Core\Units\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasUlid;
    use HasCreatedAtScope;

    public $incrementing = false;

    public const UPDATED_AT = null;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'price',
        'created_at',
        'updated_at',
    ];

    protected $casts = [];

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
