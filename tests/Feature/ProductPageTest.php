<?php

namespace Tests\Feature;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_should_be_able_to_visit_product_page()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('ProductIndex'));

        $this->assertEquals(
            200,
            $response->getStatusCode(),
            'Should complete with 200 status code'
        );
    }

    /**
     * @test
     */
    public function guest_should_not_be_able_to_visit_product_page()
    {
        $response = $this
            ->get(route('ProductIndex'));

        $this->assertEquals(
            302,
            $response->getStatusCode(),
            'Should be redirected to login page'
        );

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function user_should_be_able_to_add_product_to_cart()
    {
        $user = factory(User::class)->create();
        $product = Product::first();


        $response = $this
            ->actingAs($user)
            ->post(
                route('CartStore'), 
                [
                    'product_id' => $product->product_id
            ]);


        $userCart = $user
            ->load([
                'cart' => function ($query) {
                    return $query->where('status_id', '=', Cart::STATUS_NEW);
                }
            ])
            ->cart;
        $cartProduct = $userCart->first()->cartProduct;

        $this->assertEquals(
            $product->product_id,
            $cartProduct->first()->product_id,
            'Product should be added into users cart'
        );
    }

    /**
     * @test
     */
    public function user_should_not_be_able_to_add_product_that_is_not_exist()
    {
        $user = factory(User::class)->create();
        $product = Product::orderBy('product_id', 'DESC')
            ->first();


        $response = $this
            ->actingAs($user)
            ->post(
                route('CartStore'),
                [
                    'product_id' => $product->product_id + 1
                ]
            );

        $this->assertEquals(
            302,
            $response->session()
        );

        $response->assertSessionHas('error', 'Product ID not found!');
    }
}

?>
