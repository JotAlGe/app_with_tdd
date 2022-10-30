<?php

namespace Tests\Unit\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_cart_has_many_foods(): void
    {
        $cart = new Cart();

        $this->assertInstanceOf(Collection::class, $cart->foods);
    }
}
