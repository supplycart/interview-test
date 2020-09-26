<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_should_be_able_to_visit_cart_page()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('CartIndex'));

        $this->assertEquals(
            200,
            $response->getStatusCode(),
            'Should complete with 200 status code'
        );
    }

    /**
     * @test
     */
    public function guest_not_should_be_able_to_visit_cart_page()
    {
        $response = $this
            ->get(route('CartIndex'));

        $this->assertEquals(
            302,
            $response->getStatusCode(),
            'Should be redirected to login page'
        );

        $response->assertRedirect('/login');

    }
}
