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
    public function a_user_can_see_the_create_view(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'web')
            ->get('/foods/create')
            ->assertStatus(200)
            ->assertViewIs('foods.create');
    }

    /**
     * @test
     */
    public function a_user_can_store_a_food(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/foods', [
                'name' => 'Chicken',
                'description' => 'Chicken is a special animal that has special',
                'price' => 5.00,
                'user_id' => $user->id
            ])
            ->assertRedirect('/foods');
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


    /**
     * @test
     */
    public function a_user_can_see_the_edit_view(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create();

        $this->actingAs($user, 'web')
            ->get('/foods/' . $food->id . '/edit')
            ->assertStatus(200)
            ->assertViewIs('foods.edit')
            ->assertSee([
                $food->name,
                $food->description,
                $food->price
            ]);
    }


    /**
     * @test
     */
    public function a_user_cannot_update_any_meal(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create();

        $this->actingAs($user)
            ->put('/foods/' . $food->id)
            ->assertStatus(403);
    }

    /**
     * @test
     */
    public function a_user_can_update_their_food(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->put('/foods/' . $food->id, [
                'name' => 'new name',
                'description' => 'new description',
                'price' => 1.55
            ])
            ->assertRedirect(route('foods.index'));
    }

    /**
     * @test
     */
    public function a_user_cannot_delete_any_meal(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create();

        $this->actingAs($user)
            ->delete('/foods/' . $food->id)
            ->assertStatus(403);
    }

    /**
     * @test
     */
    public function a_user_can_delete_their_meal(): void
    {
        $user = User::factory()->create();
        $food = Food::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->delete('/foods/' . $food->id)
            ->assertStatus(302);

        $this->assertModelMissing($food, [
            'user_id' => $user->id
        ]);
    }
}
