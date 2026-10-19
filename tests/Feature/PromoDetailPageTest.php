<?php

namespace Tests\Feature;

use Tests\TestCase;

class PromoDetailPageTest extends TestCase
{
    public function test_active_promotion_card_links_to_its_detail_page(): void
    {
        $this->get('/promo')
            ->assertOk()
            ->assertSee(route('promo.show', 'first-visit-special'), false);
    }

    public function test_promotion_detail_displays_offer_terms_and_related_promotions(): void
    {
        $this->get('/promo/first-visit-special')
            ->assertOk()
            ->assertSee('Diskon 20% Facial Treatment')
            ->assertSee('Keunggulan Promo')
            ->assertSee('Syarat &amp; Ketentuan', false)
            ->assertSee('FIRST20')
            ->assertSee('Promo Menarik Lainnya')
            ->assertSee(route('booking.create', ['treatment' => 'octa-signature-glow', 'promo' => 'first-visit-special']));
    }

    public function test_unknown_promotion_returns_not_found(): void
    {
        $this->get('/promo/not-a-promotion')->assertNotFound();
    }
}
