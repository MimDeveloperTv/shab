<?php

namespace App\Models;

use Core\Concerns\HasCreatedAtScope;
use Core\Units\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasCreatedAtScope;
    use HasFactory;

    public $incrementing = false;

    public $observables = ['creating'];

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

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
