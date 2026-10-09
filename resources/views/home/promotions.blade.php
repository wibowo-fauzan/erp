<section class="section promotions-section" id="promo">
    <div class="container">
        <div class="section-heading section-heading-centered">
            <span class="eyebrow">Pilihan istimewa untukmu</span>
            <h2>Promo spesial <em>bulan ini.</em></h2>
            <p class="section-intro">Momen yang pas untuk mencoba pengalaman perawatan baru.</p>
        </div>

        <div class="promotion-grid">
            @foreach ($promotions as $promotion)
                <article class="promotion-card promotion-{{ $promotion['theme'] }}">
                    <a class="promotion-image" href="{{ route('register') }}" aria-label="Lihat promo {{ $promotion['title'] }}">
                        <img src="{{ $promotion['image'] }}" alt="{{ $promotion['alt'] }}" loading="lazy">
                        <span class="promotion-badge">{{ $promotion['eyebrow'] }}</span>
                    </a>
                    <div class="promotion-copy">
                        <h3>{{ $promotion['title'] }}</h3>
                        <p>{{ $promotion['description'] }}</p>
                        <div class="promotion-bottom"><span>{{ $promotion['price'] }}</span><a href="{{ route('register') }}" aria-label="Lihat {{ $promotion['title'] }}">↗</a></div>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="demo-note">Promo, harga, dan nama paket di atas hanya data contoh.</p>
    </div>
</section>
