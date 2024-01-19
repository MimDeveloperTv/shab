<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateProductAction;
use App\Http\Requests\API\CreateProductRequest;
use App\Models\Product;
use App\Actions\FetchProductAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\ProductResource;
use App\Http\Resources\API\ProductCollection;

class ProductController extends Controller
{
    public function index(): ProductCollection
    {
        return ProductCollection::make(
            FetchProductAction::make()->handle())
            ->additional(FetchProductAction::filterList());
    }

    public function show(string $id): ProductResource
    {
        return ProductResource::make(
            Product::query()->findOrFail($id)
        );
    }

    /**
     * @throws \Throwable
     */
    public function store(CreateProductRequest $request): ProductResource
    {
        return ProductResource::make(
            CreateProductAction::make()->handle(
                $request->getTitle(),
                $request->getPrice(),
            )
        );
    }
}
