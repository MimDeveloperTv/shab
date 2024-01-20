<?php

namespace App\Actions;

use App\Models\Product;
use Core\Actions\FetchRecords;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;

class FetchProductAction extends FetchRecords
{
    protected array $defaultSort = ['price'];

    use AsAction;

    protected function model(): string
    {
        return Product::class;
    }

    protected function getAllowedFilters(): array
    {
        return [
            AllowedFilter::scope('title_product'),
            AllowedFilter::scope('max_price'),
        ];
    }

    protected function getAllowedSorts(): array
    {
        return [
            AllowedSort::field('price'),
        ];
    }

    public static function filterList(): array
    {
        return [];
    }
}
