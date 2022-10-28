<?php

namespace Tests\Feature;

use App\Models\Food;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function a_user_can_add_a_meal_to_shopping_cart(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create();

        $this->actingAs($user, 'web')
            ->post('/carts', [
                'food_id' => $food->id,
            ])
            ->assertCreated();
    }
}
