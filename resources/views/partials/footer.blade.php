<footer class="site-footer">
    <div class="container footer-main">
        <div class="footer-about">
            <a class="brand brand-footer" href="{{ route('home') }}" aria-label="Beauty Care - Beranda">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 40 40" fill="none">
                        <path d="M20 4.5c1.2 7.1 4.1 11.2 11.5 15.5C24.1 24.3 21.2 28.4 20 35.5 18.8 28.4 15.9 24.3 8.5 20 15.9 15.7 18.8 11.6 20 4.5Z" fill="currentColor"/>
                        <path d="M6 20h28" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="brand-copy">Oeta <span>Beauty</span></span>
            </a>
            <p>Tempat untuk merawat diri, merasa nyaman, dan menemukan versi terbaik dirimu.</p>
        </div>

        <div class="footer-column">
            <h2>Menu Utama</h2>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('home') }}#layanan">Layanan</a>
            <a href="{{ route('home') }}#promo">Promo</a>
            <a href="{{ route('home') }}#artikel">Artikel</a>
            <a href="{{ route('home') }}#tentang">Tentang kami</a>
        </div>

        <div class="footer-column">
            <h2>Informasi</h2>
            <a href="{{ route('home') }}#faq">Pertanyaan umum</a>
            <a href="{{ route('login') }}">Masuk akun</a>
            <a href="{{ route('register') }}">Buat janji</a>
        </div>

        <div class="footer-contact">
            <span class="eyebrow">Hubungi kami</span>
            <p>Butuh informasi lebih lanjut? Buat akun dan mulai perjalanan perawatanmu.</p>
            <a class="footer-social" href="https://www.instagram.com/" target="_blank" rel="noreferrer">Instagram <span aria-hidden="true">↗</span></a>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ now()->year }} Beauty Care. Semua hak dilindungi.</span>
        <span>Dibuat dengan perhatian untuk setiap dirimu.</span>
    </div>
</footer>
