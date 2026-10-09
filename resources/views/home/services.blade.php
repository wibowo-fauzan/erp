<section class="section services-section" id="layanan">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">Kenali kebutuhan kulitmu</span>
                <h2>Layanan <em>terbaik kami.</em></h2>
                <p class="section-intro">Pilihan perawatan untuk membantu kulitmu merasa lebih sehat dan terawat.</p>
            </div>
            <a class="text-link" href="{{ route('register') }}">Lihat semua layanan <span aria-hidden="true">↗</span></a>
        </div>

        <div class="service-grid">
            @foreach ($services as $index => $service)
                <article class="service-card">
                    <a class="service-image service-image-{{ $index + 1 }}" href="{{ route('register') }}" aria-label="Lihat layanan {{ $service['name'] }}">
                        <img src="{{ $service['image'] }}" alt="{{ $service['alt'] }}" loading="lazy">
                        <span class="service-number">0{{ $index + 1 }}</span>
                        <span class="service-tag">{{ $service['tag'] }}</span>
                    </a>
                    <div class="service-info">
                        <div><h3>{{ $service['name'] }}</h3><p>{{ $service['description'] }}</p></div>
                        <a class="service-arrow" href="{{ route('register') }}" aria-label="Pilih {{ $service['name'] }}">↗</a>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="demo-note">Daftar layanan dan informasi di halaman ini merupakan konten contoh.</p>
    </div>
</section>
