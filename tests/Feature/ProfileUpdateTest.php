<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    public function test_profile_page_loads_booking_stats(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('profile'));

        $response->assertOk()->assertSee('Total Transaksi');
    }

    public function test_profile_update_returns_json_and_persists_contact_fields(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('profile.update'), [
            'phone' => '081234567890',
            'address' => 'Jl. Mawar No. 10',
        ]);

        $response->assertOk()->assertJson([
            'status' => 'Profil diperbarui.',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'phone' => '081234567890',
            'address' => 'Jl. Mawar No. 10',
        ]);
    }
}
