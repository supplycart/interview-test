<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_should_be_able_to_visit_order_page()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('OrderIndex'));

        $this->assertEquals(
            200,
            $response->getStatusCode(),
            'Should complete with 200 status code'
        );
    }

    /**
     * @test
     */
    public function guest_not_should_be_able_to_visit_order_page()
    {
        $response = $this
            ->get(route('OrderIndex'));

        $this->assertEquals(
            302,
            $response->getStatusCode(),
            'Should be redirected to login page'
        );

        $response->assertRedirect('/login');

    }
}
