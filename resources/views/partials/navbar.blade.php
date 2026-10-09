<a class="skip-link" href="#main-content">Lewati ke konten</a>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('home') }}" aria-label="Beauty Care - Beranda">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 40 40" fill="none">
                    <path d="M20 4.5c1.2 7.1 4.1 11.2 11.5 15.5C24.1 24.3 21.2 28.4 20 35.5 18.8 28.4 15.9 24.3 8.5 20 15.9 15.7 18.8 11.6 20 4.5Z" fill="currentColor"/>
                    <path d="M6 20h28" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="brand-copy">Oeta <span>Beauty</span></span>
        </a>

        <nav class="desktop-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" aria-current="page">Beranda</a>
            <a href="{{ route('home') }}#layanan">Layanan</a>
            <a href="{{ route('home') }}#promo">Promo</a>
            <a href="{{ route('home') }}#artikel">Artikel</a>
            <a href="{{ route('home') }}#tentang">Tentang kami</a>
        </nav>

        <div class="nav-actions">
            <a class="button button-pink button-small" href="{{ route('register') }}">Konsultasi</a>
        </div>

        <details class="mobile-menu">
            <summary aria-label="Buka menu navigasi" role="button">
                <span></span><span></span><span></span>
            </summary>
            <nav aria-label="Navigasi seluler">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('home') }}#layanan">Layanan</a>
                <a href="{{ route('home') }}#promo">Promo</a>
                <a href="{{ route('home') }}#artikel">Artikel</a>
                <a href="{{ route('home') }}#tentang">Tentang kami</a>
                <a href="{{ route('login') }}">Masuk</a>
                <a href="{{ route('register') }}">Konsultasi</a>
            </nav>
        </details>
    </div>
</header>
