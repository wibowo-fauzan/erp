<section class="section about-section" id="tentang">
    <div class="container about-grid">
        <div class="about-photo">
            <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=1000&q=85" alt="Ruang perawatan Beauty Care yang nyaman" loading="lazy">
            <div class="about-photo-caption"><strong>Ruang untuk dirimu</strong><span>Tenang, nyaman, penuh perhatian</span></div>
            <div class="about-photo-number">BEAUTY CARE · 2026</div>
        </div>
        <div class="about-copy">
            <span class="eyebrow">Alasan untuk merasa nyaman</span>
            <h2>Kenapa memilih<br><em>Oeta Beauty Care?</em></h2>
            <p class="about-lead">Kami percaya perawatan yang baik dimulai dari memahami kebutuhanmu. Setiap detail dirancang agar kunjunganmu terasa nyaman dan personal.</p>
            <div class="benefit-list">
                @foreach ($reasons as $reason)
                    <div class="benefit-item">
                        <span class="benefit-check" aria-hidden="true">{{ $reason['symbol'] }}</span>
                        <div><h3>{{ $reason['title'] }}</h3><p>{{ $reason['description'] }}</p></div>
                    </div>
                @endforeach
            </div>
            <a class="button button-outline" href="{{ route('register') }}">Kenali Beauty Care <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
