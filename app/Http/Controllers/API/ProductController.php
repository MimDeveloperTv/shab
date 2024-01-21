<?php

namespace App\Http\Controllers\API;

use App\Actions\AddImageAction;
use App\Actions\CreateOrderAction;
use App\Actions\CreateProductAction;
use App\Actions\FetchProductAction;
use App\Actions\RemoveProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateProductRequest;
use App\Http\Requests\API\ImageRequest;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\API\ImageResource;
use App\Http\Resources\API\OrderResource;
use App\Http\Resources\API\ProductCollection;
use App\Http\Resources\API\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): ProductCollection
    {
        return ProductCollection::make(
            FetchProductAction::make()->handle());
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
            CreateProductAction::make()->handle($request->getTitle(), $request->getPrice())
        );
    }

    /**
     * @throws \Throwable
     */
    public function addImage(ImageRequest $request): ImageResource
    {
        return ImageResource::make(
            AddImageAction::make()->handle($request->getId(), $request->getImage())
        );
    }

    /**
     * @throws \Throwable
     */
    public function remove(Request $request, $id): JsonResponse
    {
        return RemoveProductAction::make()->handle($id);
    }

    public function orderSubmit(OrderRequest $request): OrderResource
    {
        return OrderResource::make(
            CreateOrderAction::make()->handle($request->getIds())
        );
    }
}
