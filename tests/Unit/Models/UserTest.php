<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_has_many_foods(): void
    {
        $user = new User();

        $this->assertInstanceOf(Collection::class, $user->foods);
    }
}
