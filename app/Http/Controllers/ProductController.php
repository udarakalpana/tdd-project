<?php

namespace App\Http\Controllers;

use App\Action\Product\CreateNewProduct;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function addNewProduct(ProductCreateRequest $request, CreateNewProduct $createNewProduct): JsonResponse
    {
        $validatedRequest = $request->validated();

        return response()->json($createNewProduct($validatedRequest));
    }
}
