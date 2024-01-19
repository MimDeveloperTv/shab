<?php

namespace Core\Concerns;

use Illuminate\Database\Eloquent\Model;
use Ulid\Ulid;

trait HasUlid
{
    /**
     * Boot HasUlid trait
     */
    protected static function bootHasUlid()
    {
        static::creating(function (Model $model) {
            $model->keyType = 'string';
            $model->incrementing = false;
            $model->{$model->getKeyName()} = $model->getKey() ?: (string) Ulid::generate();
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
