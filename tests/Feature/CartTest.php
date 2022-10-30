<?php

namespace Tests\Feature;

use App\Models\Cart;
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

    /**
     * @test
     */
    public function a_user_can_see_details_their_cart(): void
    {
        $user = User::factory()->create();
        $cart = Cart::factory()->create();

        $this->actingAs($user)
            ->get('/carts/' . $cart->id)
            ->assertStatus(200)
            ->assertViewIs('carts.show');
    }


    /**
     * @test
     */
    public function a_user_can_see_the_edit_view(): void
    {
        $user = User::factory()->create();
        $cart = Cart::factory()->create();

        $this->actingAs($user)
            ->get('/carts/' . $cart->id . '/edit')
            ->assertStatus(200)
            ->assertSee([
                $cart->name,
                $cart->description
            ]);
    }


    /**
     * @test
     */
    /*     public function a_user_cannot_update_any_shopping_cart(): void
    {
        $user = User::factory()->create();
        $cart = Cart::factory()->create();

        $this->actingAs($user)
            ->put('/carts/' . $cart->id)
            ->assertForbidden();
    } */

    /**
     * @test
     */
    /*     public function a_user_can_update_their_shopping_cart(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create(['user_id' => $user->id]);
        $cart = Cart::factory()->create(['food_id' => $food->user_id]);

        $this->actingAs($user)
            ->put('/carts/' . $cart->id)
            ->assertRedirect('/foods');
    } */



    /**
     * @test
     */
    public function a_user_can_delete_their_shopping_cart(): void
    {
        $user = User::factory()->create();
        $cart = Cart::factory()->create();

        $cart->delete();

        $this->assertModelMissing($cart, [
            'user_id' => $user->id
        ]);
    }
}
