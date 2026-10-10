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
        <span class="eyebrow">Ikuti perjalanan kami</span>
        <p>Temukan inspirasi beauty dan self-care dari Oeta Beauty Care.</p>
        <div class="footer-socials" aria-label="Media sosial">
            <a class="footer-social-icon" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle class="social-dot" cx="18" cy="6" r="1"/></svg>
            </a>
            <a class="footer-social-icon" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path class="social-fill" d="M13.5 21v-8h2.7l.4-3.1h-3.1v-2c0-.9.3-1.5 1.6-1.5h1.7V3.6c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.2v2.2H7.5V13h2.8v8h3.2Z"/></svg>
            </a>
            <a class="footer-social-icon" href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3v11.2a4.2 4.2 0 1 1-3.6-4.1v3.2a1.1 1.1 0 1 0 .5.9V3H15Zm0 0c.3 2.4 1.7 4.2 4.5 4.6v3.2a8.2 8.2 0 0 1-4.5-1.7"/></svg>
            </a>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ now()->year }} Oeta Beauty Care. Semua hak dilindungi.</span>
        <span>Dibuat dengan perhatian untuk setiap dirimu.</span>
    </div>
</footer>
