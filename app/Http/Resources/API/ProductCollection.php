<?php

namespace App\Http\Resources\API;

use Core\Http\Resources\BaseResourceCollection;

class ProductCollection extends BaseResourceCollection
{
    public function with($request): array
    {
        return [
            'filters' => [
                'id' => [
                    'type' => 'text',
                    'title' => __('filters.id'),
                ],
            ],
        ];
    }
}
