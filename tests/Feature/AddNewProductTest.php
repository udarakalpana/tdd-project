<?php

namespace Tests\Feature;


use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class AddNewProductTest extends TestCase
{

//    use RefreshDatabase;

    public function test_add_new_product()
    {
        //AAA rule

        // A - arrange
        $product = Product::factory()->make()->toArray();

        // A - Act / action
        $response = $this->post('api/create-product', $product);

        // A - Assertion
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message'
        ]);
        $this->assertDatabaseHas('product', [
            'product_name' => $product['product_name'],
            'product_qty' => $product['product_qty'],
            'product_price' => $product['product_price'],
        ]);
    }

    public function test_return_bad_response_if_validation_request_failed()
    {
        $product = Product::factory()->make([
            'product_name' => 'a',
        ])->toArray();

        $response = $this->post('api/create-product', $product);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'errors'
        ]);
        $response->assertSimilarJson([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'errors' => [
                'product_name' => [
                    'The product name field must be at least 2 characters.'
                ]
            ]
        ]);
    }

}
