<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery;
use Tests\TestCase;

class GoogleAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_registration_creates_a_regular_user_and_signs_them_in(): void
    {
        $googleUser = SocialiteUser::fake([
            'id' => 'google-user-123',
            'name' => 'Google User',
            'email' => 'google@example.com',
            'user' => ['verified_email' => true],
        ]);

        $provider = Mockery::mock();
        $provider->shouldReceive('user')->once()->andReturn($googleUser);

        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($provider);

        $response = $this->get('/auth/google/callback');

        $user = User::query()->where('email', 'google@example.com')->firstOrFail();

        $this->assertSame('user', $user->role);
        $this->assertSame('google-user-123', $user->google_id);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home'));
    }

    public function test_google_registration_rejects_an_unverified_email(): void
    {
        $googleUser = SocialiteUser::fake([
            'email' => 'unverified@example.com',
            'user' => ['verified_email' => false],
        ]);

        $provider = Mockery::mock();
        $provider->shouldReceive('user')->once()->andReturn($googleUser);

        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($provider);

        $this->get('/auth/google/callback')
            ->assertRedirect('/admin/login')
            ->assertSessionHasErrors('google');

        $this->assertDatabaseMissing('users', ['email' => 'unverified@example.com']);
    }
}
