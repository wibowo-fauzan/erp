<?php

namespace Tests\Feature;

use App\Filament\Auth\Login;
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
            ->assertSee('owner')
            ->assertDontSee('auth/google');

        $this->get('/login')
            ->assertOk()
            ->assertSee('Lanjutkan dengan Google')
            ->assertSee('Daftar sekarang');

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

    public function test_regular_users_cannot_sign_in_from_the_admin_login_page(): void
    {
        $user = User::factory()->create([
            'email' => 'regular@example.com',
            'password' => 'user-password',
            'role' => 'user',
        ]);

        Livewire::test(Login::class)
            ->set('data.email', $user->email)
            ->set('data.password', 'user-password')
            ->call('authenticate')
            ->assertHasErrors(['data.email']);

        $this->assertGuest();
    }

    public function test_user_can_sign_in_from_the_user_login_page(): void
    {
        $user = User::factory()->create([
            'email' => 'regular@example.com',
            'password' => 'user-password',
            'role' => 'user',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'user-password',
        ])
            ->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_cannot_sign_in_from_the_user_login_page(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'admin-password',
            'role' => 'admin',
        ]);

        $this->from('/login')
            ->post('/login', [
                'email' => $admin->email,
                'password' => 'admin-password',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_admin_can_sign_in_from_the_admin_login_page(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'admin-password',
            'role' => 'admin',
        ]);

        Livewire::test(Login::class)
            ->set('data.email', $admin->email)
            ->set('data.password', 'admin-password')
            ->call('authenticate')
            ->assertHasNoErrors();

        $this->assertAuthenticatedAs($admin);
    }
}
