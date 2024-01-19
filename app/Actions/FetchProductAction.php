<?php

namespace App\Actions;

use App\Enums\Metadata\Type;
use App\Models\Product;
use Core\Actions\FetchRecords;
use Core\Enums\Transform;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;

class FetchProductAction extends FetchRecords
{
    use AsAction;

    protected function model(): string
    {
        return Product::class;
    }

    protected function getAllowedFilters(): array
    {
        return [
            AllowedFilter::exact('transaction_id'),
            AllowedFilter::exact('type'),
            AllowedFilter::exact('hostname'),
            AllowedFilter::exact('referer'),
        ];
    }

    public static function filterList(): array
    {
        return [
            'filters' => [
                'transaction_id' => [
                    'type' => 'text',
                    'title' => __('filters.transaction_id'),
                ],
                'hostname' => [
                    'type' => 'text',
                    'title' => __('filters.hostname'),
                ],
                'referer' => [
                    'type' => 'text',
                    'title' => __('filters.referer'),
                ],
                'type' => [
                    'type' => 'list',
                    'title' => __('filters.type'),
                    'options' => Transform::mapper(Type::VALUES),
                ],
            ],
        ];
    }
}
