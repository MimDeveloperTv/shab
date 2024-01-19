<?php

namespace Core\Enums;

use Illuminate\Support\Collection;

class Transform
{
    /**
     * @param $value
     * @return array
     */
    public static function formatter($value): array
    {
        return [
            'id' => $value,
            'title' => __('enums.'.$value),
        ];
    }

    /**
     * @param  array  $enums
     * @return Collection
     */
    public static function mapper(array $enums): Collection
    {
        return collect($enums)->map(fn ($value) => self::formatter($value));
    }
}
