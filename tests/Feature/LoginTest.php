<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_validation()
    {
        $response = $this->post(route('login'), [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function test_user_login()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertRedirect(route('welcome'));
    }

    public function test_admin_login()
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors()
            ->assertRedirect(route('welcome'));
    }

    public function test_go_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($user)
            ->get(route('home'));

        $response->assertOk()
            ->assertSee('Dashboard')
            ->assertSee('User Details')
            ->assertViewHas(['contacts', 'users', 'kids_contacts']);
    }

    public function test_dont_go_to_admin_dashboard_as_normal_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('home'));

        $response->assertStatus(403);
    }
}
