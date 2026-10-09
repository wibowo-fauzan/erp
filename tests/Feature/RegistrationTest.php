<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_custom_login_and_registration_pages_are_available(): void
    {
        $this->get('/admin/login')
            ->assertOk()
            ->assertSee('Beauty Care')
            ->assertSee('auth/google');

        $this->get('/register')
            ->assertOk()
            ->assertSee('Daftar dengan Google');
    }

    public function test_registration_creates_a_regular_user_and_signs_them_in(): void
    {
        $response = $this->post('/register', [
            'name' => 'Beauty User',
            'email' => 'beauty@example.com',
            'password' => 'Correct-Horse-Battery-7',
            'password_confirmation' => 'Correct-Horse-Battery-7',
        ]);

        $user = User::query()->where('email', 'beauty@example.com')->firstOrFail();

        $this->assertSame('user', $user->role);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home'));
    }

    public function test_regular_users_cannot_access_the_admin_panel(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/admin')
            ->assertForbidden();
    }

    public function test_regular_users_can_sign_in_from_the_custom_admin_login_page(): void
    {
        $user = User::factory()->create([
            'email' => 'regular@example.com',
            'password' => 'user-password',
            'role' => 'user',
        ]);

        Livewire::test(\App\Filament\Auth\Login::class)
            ->set('data.email', $user->email)
            ->set('data.password', 'user-password')
            ->call('authenticate')
            ->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }
}
