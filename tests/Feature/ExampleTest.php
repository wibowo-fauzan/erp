<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('<html lang="id">', false)
            ->assertSee('<title>Oeta Beauty Care | Kulit Sehat, Cantik Setiap Hari</title>', false)
            ->assertSee('name="description"', false)
            ->assertSee('rel="canonical"', false)
            ->assertSee('property="og:title"', false)
            ->assertSee('property="og:image"', false)
            ->assertSee('name="twitter:card" content="summary_large_image"', false)
            ->assertSee('property="og:locale" content="id_ID"', false)
            ->assertSee('application/ld+json', false)
            ->assertSee('Navigasi utama')
            ->assertSee('Semua hak dilindungi.')
            ->assertSee('Facial Premium')
            ->assertSee('Promo spesial')
            ->assertSee('Pertanyaan umum')
            ->assertSee('Oeta Beauty Care');
    }
}
