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
                <a href="{{ route('kontak') }}" aria-current="{{ request()->routeIs('kontak') ? 'page' : 'false' }}">Kontak</a>
        </nav>

        <div class="nav-actions">
            @auth
                <?php
                    $avatarUrl = auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : null;
                    $initial = strtoupper(substr(auth()->user()->name ?? 'U', 0, 1));
                ?>
                <details style="display:inline-block;position:relative">
                    <summary class="nav-login" style="cursor:pointer;list-style:none;display:flex;align-items:center;gap:6px">
                        @if ($avatarUrl)
                            <img src="{{ $avatarUrl }}" style="width:32px;height:32px;border-radius:50%;object-fit:cover;border:1px solid #ddd">
                        @else
                            <div style="width:32px;height:32px;border-radius:50%;background:#e5e7eb;display:flex;align-items:center;justify-content:center;font-weight:700;color:#6b7280;font-size:14px">{{ $initial }}</div>
                        @endif
                        <span style="font-size:13px">Akun</span>
                    </summary>
                    <div style="position:absolute;right:0;background:#fff;border:1px solid #eee;padding:8px;min-width:170px;z-index:99">
                        <a href="{{ route('wishlist') }}" style="display:block;padding:8px 10px;text-decoration:none;color:#111;font-size:14px">Wishlist</a>
                        <a href="{{ route('profile') }}" style="display:block;padding:8px 10px;text-decoration:none;color:#111;font-size:14px">Dashboard User</a>
                        <a href="{{ route('my-bookings') }}" style="display:block;padding:8px 10px;text-decoration:none;color:#111;font-size:14px">Booking Saya</a>
                        <form method="POST" action="{{ route('logout') }}" style="margin:0">
                            @csrf
                            <button type="submit" style="width:100%;text-align:left;padding:8px 10px;border:none;background:none;cursor:pointer;font-size:14px;color:#111">Logout</button>
                        </form>
                    </div>
                </details>
            @else
                <a class="nav-login" href="{{ route('login') }}">Masuk</a>
            @endauth
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
            <a href="{{ route('kontak') }}" aria-current="{{ request()->routeIs('kontak') ? 'page' : 'false' }}">Kontak</a>
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
