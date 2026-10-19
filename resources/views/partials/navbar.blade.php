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
            <span class="brand-copy">Octa <span>Beauty</span></span>
        </a>

        <nav class="desktop-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">Beranda</a>
            <a href="{{ route('about') }}" aria-current="{{ request()->routeIs('about') ? 'page' : 'false' }}">Tentang Kami</a>
            <a href="{{ route('treatment') }}" aria-current="{{ request()->routeIs('treatment*') ? 'page' : 'false' }}">Layanan</a>
            <a href="{{ route('promo') }}" aria-current="{{ request()->routeIs('promo*') ? 'page' : 'false' }}">Promo</a>
            <a href="{{ route('faq') }}" aria-current="{{ request()->routeIs('faq') ? 'page' : 'false' }}">FAQ</a>
            <a href="#kontak">Kontak</a>
            <a class="nav-wishlist" href="{{ route('wishlist') }}" aria-current="{{ request()->routeIs('wishlist') ? 'page' : 'false' }}">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>
                Wishlist
                <span class="nav-wishlist-count" id="wishlist-count" hidden>0</span>
            </a>
        </nav>

        <div class="nav-actions">
            <a class="nav-login" href="{{ route('login') }}">Masuk</a>
            <a class="button button-pink button-small" href="{{ route('booking.create') }}">Booking Sekarang</a>
        </div>

        <details class="mobile-menu">
            <summary aria-label="Buka menu navigasi" aria-controls="mobile-navigation">
                <span></span><span></span><span></span>
            </summary>
            <nav id="mobile-navigation" aria-label="Navigasi seluler">
                <a href="{{ route('home') }}" aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">Beranda</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
                <a href="{{ route('treatment') }}" aria-current="{{ request()->routeIs('treatment*') ? 'page' : 'false' }}">Layanan</a>
                <a href="{{ route('promo') }}" aria-current="{{ request()->routeIs('promo*') ? 'page' : 'false' }}">Promo</a>
                <a href="{{ route('faq') }}" aria-current="{{ request()->routeIs('faq') ? 'page' : 'false' }}">FAQ</a>
                <a href="#kontak">Kontak</a>
                <a class="nav-wishlist" href="{{ route('wishlist') }}">
                    <span class="nav-wishlist-label">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>
                        Wishlist
                        <span class="nav-wishlist-count" id="wishlist-count-mobile" hidden>0</span>
                    </span>
                </a>
                <a href="{{ route('login') }}">Masuk</a>
                <a class="mobile-menu-cta" href="{{ route('booking.create') }}">Booking Sekarang <span aria-hidden="true">→</span></a>
            </nav>
        </details>
    </div>
</header>
<script>
    document.querySelectorAll('.mobile-menu').forEach((menu) => {
        menu.querySelectorAll('nav a').forEach((link) => {
            link.addEventListener('click', () => menu.removeAttribute('open'));
        });
        menu.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                menu.removeAttribute('open');
                menu.querySelector('summary').focus();
            }
        });
    });

    const wishlistCounts = () => [document.getElementById('wishlist-count'), document.getElementById('wishlist-count-mobile')];

    const updateWishlistCount = () => {
        let items = [];

        try {
            items = JSON.parse(localStorage.getItem('octa.wishlist') || '[]');
        } catch (error) {
            items = [];
        }

        if (!Array.isArray(items)) {
            items = [];
        }

        wishlistCounts().forEach((badge) => {
            if (!badge) {
                return;
            }

            badge.textContent = items.length;
            badge.hidden = items.length === 0;
        });
    };

    document.addEventListener('DOMContentLoaded', updateWishlistCount);
    window.addEventListener('octa:wishlist-updated', updateWishlistCount);
</script>
