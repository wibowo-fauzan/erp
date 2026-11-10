@extends('layouts.website')

@section('meta_title', $treatment['title'] . ' | Treatment Octa Beauty Care')
@section('meta_description', $treatment['description'])
@section('meta_image', $treatment['image'])

@section('content')
    <div class="treatment-detail-page">
        <section class="treatment-detail-hero" aria-labelledby="treatment-detail-title">
            <div class="container">
                <nav class="treatment-detail-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="{{ route('treatment') }}">Facial Treatment</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">{{ $treatment['title'] }}</span>
                </nav>
                <div class="treatment-detail-hero-grid">
                    <div class="treatment-detail-intro">
                        <span class="treatment-detail-category"><span aria-hidden="true">✦</span> {{ strtoupper($treatment['category']) }} TREATMENT</span>
                        <h1 id="treatment-detail-title">{{ $treatment['title'] }}</h1>
                        <p>{{ $treatment['description'] }}</p>
                        <div class="treatment-detail-meta">
                            <span>
                                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                                {{ $treatment['duration'] }}
                            </span>
                            <span class="treatment-detail-price">{{ $treatment['price'] }}</span>
                        </div>
                        @if ($treatment['show_booking_button'] ?? true)
                            <a class="button button-pink treatment-detail-booking" href="{{ route('booking.create', ['treatment' => $treatment['slug']]) }}">Booking Treatment <span aria-hidden="true">→</span></a>
                        @endif
                    </div>
                    <figure class="treatment-detail-visual">
                        <img src="{{ $treatment['image'] }}" alt="{{ $treatment['alt'] }}" fetchpriority="high">
                        <figcaption><span aria-hidden="true">✦</span> Perawatan profesional Octa Beauty Care</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="treatment-detail-about" aria-labelledby="treatment-about-title">
            <div class="container treatment-detail-about-grid">
                <div class="treatment-detail-about-copy">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang Treatment Ini</span>
                    <h2 id="treatment-about-title">Kenali <em>{{ $treatment['title'] }}</em></h2>
                    <p>{{ $details['overview'] }}</p>
                    <div class="treatment-detail-highlights">
                        <article>
                            <span aria-hidden="true">✦</span>
                            <div><h3>Instan Glow</h3><p>Kulit terasa lebih segar setelah rangkaian perawatan.</p></div>
                        </article>
                        <article>
                            <span aria-hidden="true">◈</span>
                            <div><h3>Profesional</h3><p>Didampingi terapis yang memperhatikan kebutuhan kulitmu.</p></div>
                        </article>
                    </div>
                </div>
                <aside class="treatment-detail-benefits">
                    <h3>Manfaat Treatment</h3>
                    <ul>
                        @foreach ($details['benefits'] as $benefit)
                            <li><span aria-hidden="true">✓</span>{{ $benefit }}</li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </section>

        <section class="treatment-detail-process" aria-labelledby="treatment-process-title">
            <div class="container">
                <header class="treatment-detail-section-heading">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> The Experience</span>
                    <h2 id="treatment-process-title">Proses Treatment Kami</h2>
                </header>
                <ol class="treatment-process-steps">
                    @foreach ($details['process'] as $step)
                        <li>
                            <span class="treatment-process-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['description'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <section class="treatment-detail-guidance" aria-label="Kecocokan dan informasi treatment">
            <div class="container treatment-detail-guidance-grid">
                <div>
                    <h2>Cocok Untuk Kondisi:</h2>
                    <ul class="treatment-condition-grid">
                        @foreach ($details['conditions'] as $condition)
                            <li><span aria-hidden="true">✦</span>{{ $condition }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="treatment-precautions">
                    <h2>Yang Perlu Diketahui</h2>
                    @foreach ($details['precautions'] as $precaution)
                        <article>
                            <span class="treatment-precaution-icon" aria-hidden="true">
                                @if ($loop->first)
                                    <svg viewBox="0 0 24 24"><path d="M12 3 4 7v5c0 5 3.5 8 8 9 4.5-1 8-4 8-9V7l-8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
                                @elseif ($loop->last)
                                    <svg viewBox="0 0 24 24"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="9"/></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><path d="M12 8v5m0 3h.01"/><path d="M10 3h4l8 15-2 3H4l-2-3 8-15Z"/></svg>
                                @endif
                            </span>
                            <div><h3>{{ $precaution['title'] }}</h3><p>{{ $precaution['description'] }}</p></div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="treatment-detail-faq" aria-labelledby="treatment-faq-title">
            <div class="container treatment-detail-faq-inner">
                <header class="treatment-detail-section-heading">
                    <h2 id="treatment-faq-title">Pertanyaan Umum</h2>
                    <p>Informasi yang mungkin ingin kamu ketahui tentang {{ $treatment['title'] }}.</p>
                </header>
                <div class="treatment-detail-faq-list">
                    @foreach ($details['faqs'] as $faq)
                        <details class="treatment-detail-faq-item" @if ($loop->first) open @endif>
                            <summary>{{ $faq['question'] }}<span aria-hidden="true">+</span></summary>
                            <p>{{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="treatment-detail-products" aria-labelledby="treatment-products-title">
            <div class="container">
                <header class="treatment-detail-section-heading">
                    <h2 id="treatment-products-title">Produk yang Digunakan</h2>
                    <p>Produk perawatan yang kami gunakan dalam treatment ini.</p>
                </header>
                <div class="treatment-detail-products-grid">
                    @php
                        $productIds = $treatment['product_ids'] ?? [];
                        $treatmentProducts = collect($productIds)->map(fn ($id) => \App\Models\Product::query()->where('id', $id)->where('is_active', true)->first())->filter();
                    @endphp
                    @if ($treatmentProducts->isNotEmpty())
                        @foreach ($treatmentProducts as $product)
                            <article class="treatment-product-card">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" loading="lazy">
                                </a>
                                <div class="treatment-product-body">
                                    <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                    <p class="treatment-product-short">{{ \Illuminate\Support\Str::limit($product->description ?? '', 80) }}</p>
                                    @if ($product->price)
                                        <span class="treatment-product-price">{{ $product->price }}</span>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    @else
                        <p class="treatment-detail-empty">Belum ada produk yang ditetapkan untuk treatment ini.</p>
                    @endif
                </div>
            </div>
        </section>

        <section class="treatment-detail-related" aria-labelledby="treatment-related-title">
            <div class="container">
                <div class="treatment-detail-related-heading">
                    <div>
                        <h2 id="treatment-related-title">Treatment Terkait</h2>
                        <p>Jelajahi perawatan lain yang mungkin sesuai dengan kebutuhanmu.</p>
                    </div>
                    <a href="{{ route('treatment') }}">Lihat semua layanan <span aria-hidden="true">→</span></a>
                </div>
                <div class="treatment-detail-related-grid">
                    @foreach ($relatedTreatments as $related)
                        <article class="treatment-related-card">
                            <a class="treatment-related-image" href="{{ route('treatment.show', $related['slug']) }}">
                                <img src="{{ $related['image'] }}" alt="{{ $related['alt'] }}" loading="lazy">
                                <span>{{ $related['category'] }}</span>
                            </a>
                            <div class="treatment-related-body">
                                <h3><a href="{{ route('treatment.show', $related['slug']) }}">{{ $related['title'] }}</a></h3>
                                <p>{{ $related['description'] }}</p>
                                <div><strong>{{ $related['price'] }}</strong><a href="{{ route('treatment.show', $related['slug']) }}" aria-label="Lihat detail {{ $related['title'] }}">→</a></div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="treatment-detail-cta" aria-labelledby="treatment-cta-title">
            <div class="container">
                <div class="treatment-detail-cta-card">
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-left" aria-hidden="true">✦</span>
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-right" aria-hidden="true">✧</span>
                    <span class="eyebrow">Saatnya merawat diri</span>
                    <h2 id="treatment-cta-title">Siap Untuk Kulit Glowing?</h2>
                    <p>Jadwalkan kunjungan dan konsultasikan kebutuhan kulitmu bersama tim Octa Beauty Care.</p>
                    <a class="button button-pink" href="{{ route('booking.create', ['treatment' => $treatment['slug']]) }}">Booking Sekarang <span aria-hidden="true">→</span></a>
                    <a class="treatment-detail-cta-whatsapp" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Chat via WhatsApp</a>
                </div>
            </div>
        </section>
    </div>
@endsection
