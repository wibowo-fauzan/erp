<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\TreatmentAvailability;
use App\Models\User;
use App\Services\MidtransService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
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

    public function test_booking_calendar_renders_availability_details_as_text(): void
    {
        TreatmentAvailability::create([
            'title' => '<img src=x onerror="notExecuted()"> "quoted"',
            'description' => '<script>notExecuted()</script> & "quoted"',
            'start_date' => now('Asia/Jakarta')->addDay()->toDateString(),
            'end_date' => now('Asia/Jakarta')->addDay()->toDateString(),
            'type' => 'full_day',
            'is_active' => true,
            'created_by' => User::factory()->create()->id,
        ]);

        $this->get('/booking')
            ->assertOk()
            ->assertSee("titleText: info?.title || 'Tidak tersedia'", false)
            ->assertSee('html: content', false)
            ->assertSee('labelElement.textContent = `${label}:`', false)
            ->assertSee('document.createTextNode(` ${value}`)', false)
            ->assertSee('onerror', false)
            ->assertSee('notExecuted()', false)
            ->assertDontSee('title: `<strong>${info?.title', false)
            ->assertDontSee('${info?.description', false);
    }

    public function test_customer_can_save_a_booking_and_view_its_confirmation(): void
    {
        $this->mock(MidtransService::class)
            ->shouldReceive('createTransaction')
            ->once()
            ->andReturn(['snap_token' => 'test-snap-token', 'redirect_url' => 'https://example.test/pay']);

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
        $this->assertTrue(session()->get('guest_booking_uploads.' . $booking->reference));
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

    public function test_guest_payment_proof_requires_booking_session_and_cannot_replace_paid_status(): void
    {
        $booking = Booking::query()->create([
            'reference' => 'OCTA-' . now('Asia/Jakarta')->format('Ymd') . '-PROOF0001',
            'name' => 'Guest Customer',
            'email' => 'guest@example.com',
            'phone' => '081234567890',
            'treatment_slug' => 'royal-pearl-whitening',
            'booking_date' => now('Asia/Jakarta')->addDay()->toDateString(),
            'booking_time' => '10:30',
            'total_amount' => 250000,
            'status' => 'menunggu_konfirmasi',
            'payment_status' => 'menunggu_verifikasi',
        ]);
        $uploadRoot = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'erp-proof-' . bin2hex(random_bytes(8));
        config(['filesystems.disks.public.root' => $uploadRoot]);

        try {
            $this->post(route('booking.proof', $booking->reference), [
                'payment_proof' => UploadedFile::fake()->image('proof.jpg'),
            ])->assertForbidden();

            $session = ['guest_booking_uploads' => [$booking->reference => true]];
            $this->withSession($session)
                ->post(route('booking.proof', $booking->reference), [
                    'payment_proof' => UploadedFile::fake()->image('proof.jpg'),
                ])
                ->assertRedirect(route('booking.show', $booking->reference));

            $booking->refresh();
            $this->assertNotEmpty($booking->payment_proof);
            $this->assertFileExists($uploadRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $booking->payment_proof));

            $booking->update(['payment_status' => 'dikonfirmasi']);
            $this->withSession($session)
                ->post(route('booking.proof', $booking->reference), [
                    'payment_proof' => UploadedFile::fake()->image('replacement.jpg'),
                ])
                ->assertStatus(409);
        } finally {
            File::deleteDirectory($uploadRoot);
        }
    }

    public function test_authenticated_customers_cannot_upload_proof_for_another_customers_booking(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $booking = Booking::query()->create([
            'reference' => 'OCTA-' . now('Asia/Jakarta')->format('Ymd') . '-OWNER00001',
            'user_id' => $owner->id,
            'name' => $owner->name,
            'email' => $owner->email,
            'phone' => '081234567890',
            'treatment_slug' => 'royal-pearl-whitening',
            'booking_date' => now('Asia/Jakarta')->addDay()->toDateString(),
            'booking_time' => '10:30',
            'total_amount' => 250000,
            'status' => 'menunggu_konfirmasi',
            'payment_status' => 'menunggu_verifikasi',
        ]);

        $this->actingAs($otherUser)
            ->post(route('booking.proof', $booking->reference), [
                'payment_proof' => UploadedFile::fake()->image('proof.jpg'),
            ])
            ->assertForbidden();
    }
}
