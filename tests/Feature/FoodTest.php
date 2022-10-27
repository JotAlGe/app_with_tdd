<?php

namespace Tests\Feature;

use App\Models\Food;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function a_user_can_see_all_foods(): void
    {
        $user = User::factory()->create();
        $foods = Food::factory()->count(10)->create();

        $this->actingAs($user, 'web')
            ->get('/foods')
            ->assertStatus(200)
            ->assertSee([
                $foods[0]->name,
                $foods[0]->description,
                $foods[0]->price
            ]);

        $this->assertModelExists($foods[0], $foods);
        $this->assertModelExists($foods[1], $foods);
        $this->assertModelExists($foods[2], $foods);
    }

    /**
     * @test
     */
    public function a_user_can_see_the_food_details(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create();

        $this->actingAs($user, 'web')
            ->get(route('foods.show', $food))
            ->assertStatus(200)
            ->assertViewIs('foods.show')
            ->assertSee([
                $food->name,
                $food->description,
                $food->price
            ]);
    }
}
