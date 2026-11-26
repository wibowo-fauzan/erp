<?php

namespace Tests\Feature;

use App\Models\Treatment;
use Tests\TestCase;

class TreatmentDetailPageTest extends TestCase
{
    public function test_treatment_filters_are_generated_from_active_database_treatments(): void
    {
        Treatment::create([
            'slug' => 'acne-care-special',
            'name' => 'Acne Care Special',
            'filter' => 'acne-care',
            'category' => 'Acne Care',
        ]);

        Treatment::create([
            'slug' => 'inactive-treatment',
            'name' => 'Inactive Treatment',
            'filter' => 'inactive-category',
            'category' => 'Inactive Category',
            'is_active' => false,
        ]);

        $this->get('/treatment')
            ->assertOk()
            ->assertSee('data-filter="acne-care">Acne Care', false)
            ->assertSee('data-filter="acne-care"', false)
            ->assertDontSee('data-filter="inactive-category"', false);
    }

    public function test_treatment_card_links_to_its_detail_page(): void
    {
        $this->get('/treatment')
            ->assertOk()
            ->assertSee(route('booking.create', ['treatment' => 'octa-signature-glow']), false);
    }

    public function test_treatment_detail_displays_information_and_related_treatments(): void
    {
        $this->get('/treatment/octa-signature-glow')
            ->assertOk()
            ->assertSee('Octa Signature Glow')
            ->assertSee('Tentang Treatment Ini')
            ->assertSee('Manfaat Treatment')
            ->assertSee('Proses Treatment Kami')
            ->assertSee('Cocok Untuk Kondisi:')
            ->assertSee('Yang Perlu Diketahui')
            ->assertSee('Pertanyaan Umum')
            ->assertSee('Treatment Terkait')
            ->assertSee(route('booking.create', ['treatment' => 'octa-signature-glow']), false);
    }

    public function test_unknown_treatment_detail_returns_not_found(): void
    {
        $this->get('/treatment/not-a-treatment')->assertNotFound();
    }
}
