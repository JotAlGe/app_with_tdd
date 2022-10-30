<?php

namespace Tests\Unit\Models;

use App\Models\Cart;
use App\Models\Food;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_food_belongs_to_a_user(): void
    {
        $food = Food::factory()->create();

        $this->assertInstanceOf(User::class, $food->user);
    }
}
