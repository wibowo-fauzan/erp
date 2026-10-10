@php
    $services = [
        ['name' => 'Facial Premium', 'description' => 'Perawatan menyeluruh untuk kulit yang tampak segar dan terawat.', 'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=700&q=85', 'alt' => 'Perawatan facial profesional', 'tag' => 'FAVORIT'],
        ['name' => 'Acne Care', 'description' => 'Perhatian lembut untuk kulit yang rentan berjerawat.', 'image' => 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=700&q=85', 'alt' => 'Produk perawatan kulit', 'tag' => 'SKIN CONCERN'],
        ['name' => 'Hydrating Glow', 'description' => 'Bantu kulit terasa lembap, nyaman, dan bercahaya.', 'image' => 'https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?auto=format&fit=crop&w=700&q=85', 'alt' => 'Rangkaian skincare untuk hidrasi', 'tag' => 'GLOW & HYDRATE'],
        ['name' => 'Relaxing Massage', 'description' => 'Waktu relaksasi untuk melepas penat dan merawat diri.', 'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=700&q=85', 'alt' => 'Suasana spa yang menenangkan', 'tag' => 'BODY TREATMENT'],
    ];

    $reasons = [
        ['title' => 'Terapis berpengalaman', 'description' => 'Ditangani oleh tim yang mengutamakan kenyamanan dan kebutuhanmu.', 'symbol' => '✳'],
        ['title' => 'Produk pilihan', 'description' => 'Produk perawatan dipilih dengan perhatian pada kualitas.', 'symbol' => '♡'],
        ['title' => 'Ruang yang nyaman', 'description' => 'Nikmati suasana tenang untuk jeda dari rutinitas harian.', 'symbol' => '⌂'],
        ['title' => 'Perhatian personal', 'description' => 'Pengalaman perawatan menyesuaikan kebutuhan setiap pelanggan.', 'symbol' => '✧'],
    ];

    $promotions = [
        ['eyebrow' => 'PAKET PERKENALAN', 'title' => 'Glow Starter', 'description' => 'Mulai rutinitas perawatan dengan pilihan favorit.', 'price' => 'Mulai dari Rp 199.000', 'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=800&q=85', 'alt' => 'Pilihan produk skincare', 'theme' => 'rose'],
        ['eyebrow' => 'MOMEN BERDUA', 'title' => 'Self-care Duo', 'description' => 'Nikmati waktu perawatan dan relaksasi bersama.', 'price' => 'Paket mulai Rp 399.000', 'image' => 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=800&q=85', 'alt' => 'Ruang relaksasi untuk perawatan tubuh', 'theme' => 'dark'],
        ['eyebrow' => 'PILIHAN BULAN INI', 'title' => 'Fresh Face Ritual', 'description' => 'Waktu singkat untuk wajah terasa lebih segar.', 'price' => 'Lihat paket perawatan', 'image' => 'https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=800&q=85', 'alt' => 'Ritual perawatan wajah', 'theme' => 'rose'],
    ];

    $treatmentBenefits = [
        'Dimulai dengan konsultasi singkat',
        'Rangkaian perawatan dengan produk pilihan',
        'Waktu relaksasi untuk dirimu',
    ];

    $articles = [
        ['category' => 'SKINCARE', 'title' => 'Rutinitas sederhana untuk kulit terasa lebih nyaman', 'excerpt' => 'Kenali langkah dasar merawat kulit yang bisa dimulai dari rumah.', 'image' => 'https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=700&q=85', 'alt' => 'Perawatan kulit sederhana di rumah'],
        ['category' => 'SELF-CARE', 'title' => 'Meluangkan waktu untuk diri sendiri bukan hal egois', 'excerpt' => 'Temukan cara kecil untuk menyisipkan jeda di tengah rutinitas.', 'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&w=700&q=85', 'alt' => 'Momen perawatan diri yang menenangkan'],
        ['category' => 'BEAUTY TIPS', 'title' => 'Apa yang perlu disiapkan sebelum facial pertama?', 'excerpt' => 'Beberapa hal sederhana agar kunjungan pertamamu lebih nyaman.', 'image' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=700&q=85', 'alt' => 'Persiapan untuk perawatan facial'],
        ['category' => 'WELLNESS', 'title' => 'Ritual relaksasi singkat setelah hari yang panjang', 'excerpt' => 'Ide sederhana untuk membantu tubuh dan pikiran beristirahat.', 'image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=700&q=85', 'alt' => 'Suasana relaksasi dan wellness'],
    ];

@endphp

@extends('layouts.website')

@section('meta_title', 'Oeta Beauty Care | Kulit Sehat, Cantik Setiap Hari')
@section('meta_description', 'Jelajahi perawatan wajah, body treatment, dan momen self-care di Oeta Beauty Care. Pengalaman nyaman dan personal untuk merawat dirimu.')
@section('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85')

@section('content')
    <section class="hero" aria-labelledby="hero-title">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Oeta Beauty Care</span>
                <h1 id="hero-title">Kulit Sehat,<br><em>Cantik Setiap Hari</em></h1>
                <p class="hero-description">Temukan waktu untuk merawat diri dengan perawatan wajah dan tubuh yang nyaman, personal, dan penuh perhatian.</p>
                <div class="hero-actions">
                    <a class="button button-pink" href="{{ route('register') }}">Mulai Perawatan <span aria-hidden="true">→</span></a>
                    <a class="text-link" href="#layanan">Jelajahi layanan <span aria-hidden="true">↗</span></a>
                </div>
                <div class="hero-trust">
                    <span class="trust-icon" aria-hidden="true">✧</span>
                    <p><strong>Waktu terbaik adalah waktu untuk dirimu.</strong><br>Ruang nyaman untuk jeda dan merawat diri.</p>
                </div>
            </div>
            <div class="hero-photo">
                <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&q=90" alt="Perawatan wajah yang menenangkan">
                <div class="hero-photo-wash" aria-hidden="true"></div>
                <div class="hero-stamp" aria-label="Perawatan dengan penuh perhatian">
                    <span>CARE<br>FOR YOUR<br>BEAUTY</span><b aria-hidden="true">✧</b>
                </div>
                <div class="hero-photo-label"><span>RITUAL SELF-CARE</span><span>01 / OETA BEAUTY</span></div>
            </div>
        </div>
    </section>

    <section class="trust-strip container" aria-label="Keunggulan Oeta Beauty Care">
        <div class="trust-item"><span aria-hidden="true">✳</span><p><strong>Perawatan personal</strong><small>Untuk kebutuhanmu</small></p></div>
        <span class="trust-divider" aria-hidden="true"></span>
        <div class="trust-item"><span aria-hidden="true">♡</span><p><strong>Produk pilihan</strong><small>Dengan perhatian pada kualitas</small></p></div>
        <span class="trust-divider" aria-hidden="true"></span>
        <div class="trust-item"><span aria-hidden="true">✧</span><p><strong>Suasana nyaman</strong><small>Waktu untuk dirimu</small></p></div>
    </section>

    <section class="section services-section" id="layanan" aria-labelledby="services-title">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Layanan kami</span>
                    <h2 id="services-title">Temukan perawatan yang <em>tepat untukmu</em></h2>
                    <p class="section-intro">Pilihan perawatan untuk membantu kamu merasa segar, nyaman, dan percaya diri.</p>
                </div>
                <a class="text-link" href="{{ route('register') }}">Lihat semua layanan <span aria-hidden="true">↗</span></a>
            </div>
            <div class="service-grid">
                @foreach ($services as $service)
                    <article class="service-card">
                        <a class="service-image" href="{{ route('register') }}" aria-label="Pilih layanan {{ $service['name'] }}">
                            <img src="{{ $service['image'] }}" alt="{{ $service['alt'] }}" loading="lazy">
                            <span class="service-number">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <span class="service-tag">{{ $service['tag'] }}</span>
                        </a>
                        <div class="service-info">
                            <div><h3>{{ $service['name'] }}</h3><p>{{ $service['description'] }}</p></div>
                            <a class="service-arrow" href="{{ route('register') }}" aria-label="Pilih {{ $service['name'] }}">↗</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section about-section" id="tentang" aria-labelledby="about-title">
        <div class="container about-grid">
            <div class="about-photo">
                <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=1000&q=85" alt="Interior ruang perawatan yang tenang" loading="lazy">
                <span class="about-photo-number">OETA BEAUTY CARE · EST. WITH CARE</span>
                <div class="about-photo-caption"><strong>Ruang nyaman untukmu</strong><span>JEDA SEJENAK, RAWAT DIRI</span></div>
            </div>
            <div class="about-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang kami</span>
                <h2 id="about-title">Merawat diri adalah cara untuk <em>menyayangi diri</em></h2>
                <p class="about-lead">Di Oeta Beauty Care, setiap kunjungan adalah kesempatan untuk berhenti sejenak, merasa nyaman, dan memberikan perhatian lebih untuk dirimu.</p>
                <div class="benefit-list">
                    @foreach ($reasons as $reason)
                        <div class="benefit-item">
                            <span class="benefit-check" aria-hidden="true">{{ $reason['symbol'] }}</span>
                            <div><h3>{{ $reason['title'] }}</h3><p>{{ $reason['description'] }}</p></div>
                        </div>
                    @endforeach
                </div>
                <a class="button button-outline" href="{{ route('register') }}">Kenali layanan kami <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    <section class="section promotions-section" id="promo" aria-labelledby="promotions-title">
        <div class="container">
            <div class="section-heading section-heading-centered">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Penawaran spesial</span>
                <h2 id="promotions-title">Sedikit jeda, <em>banyak bahagia</em></h2>
                <p class="section-intro">Temukan paket pilihan untuk memulai atau melengkapi momen self-care-mu.</p>
            </div>
            <div class="promotion-grid">
                @foreach ($promotions as $promotion)
                    <article class="promotion-card {{ $promotion['theme'] === 'dark' ? 'promotion-dark' : '' }}">
                        <div class="promotion-image">
                            <img src="{{ $promotion['image'] }}" alt="{{ $promotion['alt'] }}" loading="lazy">
                            <span class="promotion-badge">{{ $promotion['eyebrow'] }}</span>
                        </div>
                        <div class="promotion-copy">
                            <h3>{{ $promotion['title'] }}</h3>
                            <p>{{ $promotion['description'] }}</p>
                            <div class="promotion-bottom"><span>{{ $promotion['price'] }}</span><a href="{{ route('register') }}" aria-label="Lihat promo {{ $promotion['title'] }}">↗</a></div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="featured-section" aria-labelledby="featured-title">
        <div class="container featured-card">
            <div class="featured-image">
                <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=90" alt="Perawatan facial premium dengan masker wajah" loading="lazy">
                <span class="featured-image-label">PILIHAN PERAWATAN OETA</span>
            </div>
            <div class="featured-copy">
                <span class="eyebrow">PENGALAMAN PILIHAN</span>
                <h2 id="featured-title">Oeta Royal Gold Facial</h2>
                <p>Ritual facial premium yang memadukan sentuhan relaksasi dan perawatan kulit dalam satu pengalaman istimewa.</p>
                <ul>
                    @foreach ($treatmentBenefits as $benefit)
                        <li><span aria-hidden="true">✓</span>{{ $benefit }}</li>
                    @endforeach
                </ul>
                <a class="button button-pink" href="{{ route('register') }}">Jelajahi perawatan <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    <section class="section reasons-section" aria-labelledby="reasons-title">
        <div class="container">
            <div class="section-heading section-heading-centered">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Keistimewaan Oeta</span>
                <h2 id="reasons-title">Perhatian kecil, pengalaman <em>yang berarti</em></h2>
                <p class="section-intro">Kami ingin setiap momen perawatan terasa tenang, nyaman, dan personal.</p>
            </div>
            <div class="reasons-grid">
                @foreach (array_slice($reasons, 0, 3) as $reason)
                    <article class="reason-card">
                        <span class="reason-symbol" aria-hidden="true">{{ $reason['symbol'] }}</span>
                        <div><h3>{{ $reason['title'] }}</h3><p>{{ $reason['description'] }}</p></div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section articles-section" id="artikel" aria-labelledby="articles-title">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Jurnal kecantikan</span>
                    <h2 id="articles-title">Cerita kecil tentang <em>beauty & self-care</em></h2>
                </div>
                <a class="text-link" href="#artikel">Jelajahi artikel <span aria-hidden="true">↗</span></a>
            </div>
            <div class="article-grid">
                @foreach ($articles as $article)
                    <article class="article-card">
                        <a class="article-image" href="#artikel" aria-label="Baca {{ $article['title'] }}">
                            <img src="{{ $article['image'] }}" alt="{{ $article['alt'] }}" loading="lazy">
                        </a>
                        <span class="article-category">{{ $article['category'] }}</span>
                        <h3><a href="#artikel">{{ $article['title'] }}</a></h3>
                        <p>{{ $article['excerpt'] }}</p>
                        <a class="article-link" href="#artikel">Baca selengkapnya <span aria-hidden="true">→</span></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="closing-cta" aria-labelledby="cta-title">
        <div class="container closing-cta-inner">
            <span class="cta-flower" aria-hidden="true">✿</span>
            <span class="eyebrow">WAKTUNYA UNTUK DIRIMU</span>
            <h2 id="cta-title">Siap untuk merasa <em>lebih baik?</em></h2>
            <p>Mulai perjalanan self-care-mu bersama Oeta Beauty Care. Kami akan menemani setiap langkahnya.</p>
            <a class="button button-light" href="{{ route('register') }}">Buat janji perawatan <span aria-hidden="true">→</span></a>
        </div>
    </section>
@endsection
