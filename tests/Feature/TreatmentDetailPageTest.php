<?php

namespace Tests\Feature;

use Tests\TestCase;

class TreatmentDetailPageTest extends TestCase
{
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
