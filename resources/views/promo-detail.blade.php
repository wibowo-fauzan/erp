@extends('layouts.website')

@section('meta_title', $promotion['detail_title'] . ' | Promo Octa Beauty Care')
@section('meta_description', $promotion['detail_description'])
@section('meta_image', $promotion['image'])

@section('content')
    <div class="promo-detail-page">
        <section class="promo-detail-hero" aria-labelledby="promo-detail-title">
            <span class="promo-detail-flower promo-detail-flower-one" aria-hidden="true">✿</span>
            <span class="promo-detail-flower promo-detail-flower-two" aria-hidden="true">✿</span>
            <div class="container promo-detail-hero-grid">
                <div class="promo-detail-copy">
                    <nav class="promo-detail-breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ route('home') }}">Beranda</a>
                        <span aria-hidden="true">/</span>
                        <a href="{{ route('promo') }}">Promo</a>
                        <span aria-hidden="true">/</span>
                        <span aria-current="page">{{ $promotion['title'] }}</span>
                    </nav>
                    <span class="promo-detail-eyebrow"><span aria-hidden="true">✦</span> {{ $promotion['eyebrow'] }}</span>
                    <h1 id="promo-detail-title">{{ $promotion['detail_title'] }}</h1>
                    <div class="promo-detail-offer-meta">
                        <span class="promo-detail-discount">{{ $promotion['discount'] }}</span>
                        <span><small>Periode Promo</small><strong>{{ $promotion['date'] }}</strong></span>
                    </div>
                    <p class="promo-detail-description">{{ $promotion['detail_description'] }}</p>
                    <a class="button button-pink promo-detail-booking" href="{{ route('booking.create', ['treatment' => $promotion['treatment_slug'], 'promo' => $promotion['slug']]) }}">Booking Promo <span aria-hidden="true">→</span></a>
                </div>
                <figure class="promo-detail-visual">
                    <img src="{{ $promotion['image'] }}" alt="{{ $promotion['alt'] }}" fetchpriority="high">
                    <figcaption><span aria-hidden="true">✦</span> Penawaran spesial Octa Beauty Care</figcaption>
                </figure>
            </div>
        </section>

        <section class="promo-detail-benefits" aria-labelledby="promo-benefits-title">
            <div class="container">
                <header class="promo-detail-section-heading">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Lebih banyak alasan untuk merawat diri</span>
                    <h2 id="promo-benefits-title">Keunggulan Promo</h2>
                </header>
                <div class="promo-benefits-grid">
                    @foreach ($promotion['benefits'] as $benefit)
                        <article class="promo-benefit-card">
                            <span class="promo-benefit-icon" aria-hidden="true">
                                @if ($loop->first)
                                    <svg viewBox="0 0 24 24"><path d="m12 3 2.7 5.5 6 .9-4.4 4.3 1 6-5.3-2.8-5.3 2.8 1-6-4.4-4.3 6-.9L12 3Z"/></svg>
                                @elseif ($loop->last)
                                    <svg viewBox="0 0 24 24"><path d="M4 19.5h16M6 16l3.2-4 3 2.5 5.8-7"/><path d="M14 7.5h4v4"/></svg>
                                @elseif ($loop->iteration === 2)
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.3"/><path d="M5 20c.4-3.4 3-5.5 7-5.5s6.6 2.1 7 5.5"/><path d="m9.7 11 1.5 1.5 3.1-3.1"/></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><path d="m12 3 7 3v5.5c0 4.4-3 7.3-7 8.5-4-1.2-7-4.1-7-8.5V6l7-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                                @endif
                            </span>
                            <h3>{{ $benefit['title'] }}</h3>
                            <p>{{ $benefit['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="promo-detail-terms" aria-labelledby="promo-terms-title">
            <div class="container">
                <div class="promo-terms-wrap">
                    <header class="promo-detail-section-heading promo-terms-heading">
                        <span class="eyebrow"><span class="eyebrow-dot"></span> Informasi promo</span>
                        <h2 id="promo-terms-title">Syarat &amp; Ketentuan</h2>
                    </header>
                    <ul class="promo-terms-list">
                        @foreach ($promotion['terms'] as $term)
                            <li><span aria-hidden="true">✓</span>{{ $term }}</li>
                        @endforeach
                    </ul>
                    <div class="promo-terms-code"><span>Kode promo</span><strong>{{ $promotion['code'] }}</strong></div>
                </div>
            </div>
        </section>

        <section class="promo-detail-related" aria-labelledby="promo-related-title">
            <div class="container">
                <div class="promo-detail-related-heading">
                    <div>
                        <h2 id="promo-related-title">Promo Menarik Lainnya</h2>
                        <p>Jangan lewatkan penawaran spesial lainnya dari Octa.</p>
                    </div>
                    <a href="{{ route('promo') }}">Lihat Semua Promo <span aria-hidden="true">→</span></a>
                </div>
                <div class="promo-related-grid">
                    @foreach ($relatedPromotions as $related)
                        <article class="promo-related-card">
                            <a class="promo-related-image" href="{{ route('promo.show', $related['slug']) }}">
                                <img src="{{ $related['image'] }}" alt="{{ $related['alt'] }}" loading="lazy">
                                <span>{{ $related['discount'] }} OFF</span>
                            </a>
                            <div class="promo-related-body">
                                <span class="promo-offer-eyebrow">{{ $related['eyebrow'] }}</span>
                                <h3><a href="{{ route('promo.show', $related['slug']) }}">{{ $related['title'] }}</a></h3>
                                <p>{{ $related['description'] }}</p>
                                <div><strong>{{ $related['code'] }}</strong><a href="{{ route('promo.show', $related['slug']) }}" aria-label="Lihat promo {{ $related['title'] }}">→</a></div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
