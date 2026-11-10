@extends('layouts.website')

@section('meta_title', $product->name . ' | Produk Octa Beauty Care')
@section('meta_description', $product->description)
@section('meta_image', $product->image)

@section('content')
    <div class="treatment-detail-page">
        <section class="treatment-detail-hero" aria-labelledby="product-detail-title">
            <div class="container">
                <nav class="treatment-detail-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="{{ route('treatment') }}">Layanan</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">{{ $product->name }}</span>
                </nav>
                <div class="treatment-detail-hero-grid">
                    <div class="treatment-detail-intro">
                        <span class="treatment-detail-category"><span aria-hidden="true">✦</span> {{ strtoupper($product->category ?? 'Produk') }}</span>
                        <h1 id="product-detail-title">{{ $product->name }}</h1>
                        <p>{{ $product->description }}</p>
                        @if ($product->price)
                            <div class="treatment-detail-meta">
                                <span class="treatment-detail-price">{{ $product->price }}</span>
                            </div>
                        @endif
                        <a class="button button-pink treatment-detail-booking" href="{{ route('booking.create') }}">Booking Sekarang <span aria-hidden="true">→</span></a>
                    </div>
                    <figure class="treatment-detail-visual">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" fetchpriority="high">
                        <figcaption><span aria-hidden="true">✦</span> Produk perawatan Octa Beauty Care</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="treatment-detail-about" aria-labelledby="product-about-title">
            <div class="container treatment-detail-about-grid">
                <div class="treatment-detail-about-copy">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang Produk Ini</span>
                    <h2 id="product-about-title">Kenali <em>{{ $product->name }}</em></h2>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </section>

        <section class="treatment-detail-cta" aria-labelledby="product-cta-title">
            <div class="container">
                <div class="treatment-detail-cta-card">
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-left" aria-hidden="true">✦</span>
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-right" aria-hidden="true">✧</span>
                    <span class="eyebrow">Saatnya merawat diri</span>
                    <h2 id="product-cta-title">Siap Untuk Kulit Glowing?</h2>
                    <p>Jadwalkan kunjungan dan konsultasikan kebutuhan kulitmu bersama tim Octa Beauty Care.</p>
                    <a class="button button-pink" href="{{ route('booking.create') }}">Booking Sekarang <span aria-hidden="true">→</span></a>
                    <a class="treatment-detail-cta-whatsapp" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Chat via WhatsApp</a>
                </div>
            </div>
        </section>
    </div>
@endsection
