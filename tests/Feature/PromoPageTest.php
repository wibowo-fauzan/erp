<?php

namespace Tests\Feature;

use Tests\TestCase;

class PromoPageTest extends TestCase
{
    public function test_promo_page_displays_available_and_upcoming_offers(): void
    {
        $this->get('/promo')
            ->assertOk()
            ->assertSee('Promo &amp; Penawaran Spesial', false)
            ->assertSee('Promo Berjalan')
            ->assertSee('First Visit Special')
            ->assertSee('Paket Brightening Glow')
            ->assertSee('Cara Klaim Promo')
            ->assertSee('Baru Saja Berakhir')
            ->assertSee('Segera Hadir')
            ->assertSee('promo-berjalan')
            ->assertSee(route('promo'));

        $this->get('/')
            ->assertOk()
            ->assertSee(route('promo') . '#promo-berjalan', false);
    }
}
