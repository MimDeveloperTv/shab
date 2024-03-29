<?php

namespace App\Models;

use App\Models\Concerns\HasModelScope;
use App\Models\Concerns\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasModelScope;

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
