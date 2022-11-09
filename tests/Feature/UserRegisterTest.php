<?php


namespace Tests\Feature;



use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;



class UserRegisterTest extends TestCase

{

    use RefreshDatabase, WithFaker;



    /**

     * @test

     */

    public function it_can_show_the_register_view(): void

    {

        $this->get(route('register'))

            ->assertStatus(200)

            ->assertViewIs('auth.register');
    }



    /**

     * @test

     */

    public function it_cannot_allow_empty_fields(): void

    {

        $this->post(route('register'), [])

            ->assertSessionHasErrors();
    }





    /**

     * @test

     */

    public function it_can_register_a_user(): void

    {



        $this->post(route('register'), [

            'name' => 'Juan',

            'email' => 'juan@gmail.com',

            'password' => 'password',

            'password_confirmation' => 'password',

        ])

            ->assertRedirect(route('home'));



        $this->assertDatabaseCount('users', 1);
    }


    /**
     * @test
     */
    public function a_user_can_log_in(): void

    {

        $user = User::factory()->create([
            'password' => bcrypt('password')
        ]);



        $this->post(route('login'), [

            'email' => $user->email,
            'username' => $user->username,
            'password' => 'password'

        ])

            ->assertRedirect(route('home'));
    }

    /**

     * @test

     */

    public function a_user_can_see_the_home_view(): void

    {

        $user = User::factory()->create();



        $this->actingAs($user)

            ->get(route('home'))

            ->assertOk()

            ->assertViewIs('home')

            ->assertSee($user->name);
    }
}
