<?php

namespace App\Action\Product;

use App\Models\Product;

class CreateNewProduct
{
    public function __invoke(array $productDetails): array
    {
        $product = Product::create([
            'product_name' => $productDetails['product_name'],
            'product_qty' => $productDetails['product_qty'],
            'product_price' => $productDetails['product_price'],
        ]);

        if (!$product) {
            return [
                'status' => 500,
                'message' => 'Product not created'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Product created successfully'
        ];
    }
}
