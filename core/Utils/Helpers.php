<?php

namespace Core\Utils;

use Hidehalo\Nanoid\Client;
use Ulid\Ulid;

class Helpers
{
    /**
     * Get user id from http request header sent by other services
     *
     * @return array|string|null
     */
    public static function getUserId(): array|string|null
    {
        return request()->header('x-user-id');
    }

    /**
     * @param  string  $id
     * @return string
     */
    public static function generateTrackId(string $id): string
    {
        $baseTen = base_convert($id, 36, 10);

        return config('settings.switch_id').substr($baseTen, -12);
    }

    /**
     * @param  int  $length
     * @return string
     */
    public static function nanoIdGenerator(int $length = 12): string
    {
        return (new Client())->formattedId(config('settings.crockford_chars'), $length);
    }

    public static function ulidFromTimestamp($date): string
    {
        return (string) Ulid::fromTimestamp(strtotime($date) * 1000);
    }
}