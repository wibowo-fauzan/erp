<?php

namespace Tests\Feature;

use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_page_shows_treatments_and_preselects_query_parameters(): void
    {
        $this->get('/booking?treatment=royal-pearl-whitening&promo=brightening-glow')
            ->assertOk()
            ->assertSee('Booking Treatment')
            ->assertSee('Royal Pearl Whitening')
            ->assertSee('Paket Brightening Glow')
            ->assertSee('Pilih Jadwal')
            ->assertSee('Data Diri')
            ->assertSee('value="' . now('Asia/Jakarta')->toDateString() . '"', false);
    }

    public function test_customer_can_save_a_booking_and_view_its_confirmation(): void
    {
        $response = $this->post('/booking', [
            'name' => 'Amanda Octa',
            'email' => 'amanda@example.com',
            'phone' => '081234567890',
            'treatment_slug' => 'royal-pearl-whitening',
            'promotion_slug' => 'brightening-glow',
            'booking_date' => now('Asia/Jakarta')->addDay()->toDateString(),
            'booking_time' => '10:30',
            'notes' => 'Kulit sensitif',
            'terms' => '1',
        ]);

        $booking = Booking::query()->firstOrFail();

        $this->assertStringStartsWith('OCTA-' . now('Asia/Jakarta')->format('Ymd') . '-', $booking->reference);
        $this->assertSame('GLOW30', $booking->promotion_code);
        $response->assertRedirect(route('booking.show', $booking->reference));

        $this->get(route('booking.show', $booking->reference))
            ->assertOk()
            ->assertSee($booking->reference)
            ->assertSee('Royal Pearl Whitening')
            ->assertSee('GLOW30');
    }

    public function test_booking_rejects_unknown_treatments_and_past_dates(): void
    {
        $this->from('/booking')
            ->post('/booking', [
                'name' => 'Amanda Octa',
                'email' => 'amanda@example.com',
                'phone' => '081234567890',
                'treatment_slug' => 'unknown-treatment',
                'booking_date' => now('Asia/Jakarta')->subDay()->toDateString(),
                'booking_time' => '10:30',
                'terms' => '1',
            ])
            ->assertRedirect('/booking')
            ->assertSessionHasErrors(['treatment_slug', 'booking_date']);

        $this->assertDatabaseCount('bookings', 0);
    }

    public function test_booking_rejects_a_promotion_for_a_different_treatment(): void
    {
        $this->from('/booking')
            ->post('/booking', [
                'name' => 'Amanda Octa',
                'email' => 'amanda@example.com',
                'phone' => '081234567890',
                'treatment_slug' => 'octa-signature-glow',
                'promotion_slug' => 'brightening-glow',
                'booking_date' => now('Asia/Jakarta')->addDay()->toDateString(),
                'booking_time' => '10:30',
                'terms' => '1',
            ])
            ->assertRedirect('/booking')
            ->assertSessionHasErrors('promotion_slug');

        $this->assertDatabaseCount('bookings', 0);
    }

    public function test_faq_page_displays_categories_questions_and_contact_options(): void
    {
        $this->get('/faq')
            ->assertOk()
            ->assertSee('Pertanyaan yang Sering')
            ->assertSee('Umum')
            ->assertSee('Booking')
            ->assertSee('Apakah harus melakukan booking terlebih dahulu sebelum datang?')
            ->assertSee('Masih punya pertanyaan?')
            ->assertSee('mailto:hello@octabeautycare.com');
    }
}
