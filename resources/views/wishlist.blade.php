@extends('layouts.website')

@section('meta_title', 'Wishlist | Octa Beauty Care')
@section('meta_description', 'Kumpulan treatment favorit kamu di Octa Beauty Care. Klik ikon hati di halaman Layanan untuk menambahkan treatment ke wishlist.')
@section('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85')

@section('content')
    <section class="wishlist-page" aria-labelledby="wishlist-title">
        <div class="container">
            <header class="wishlist-head">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Favorit Kamu</span>
                <h1 id="wishlist-title">Wishlist <em>Perawatan</em></h1>
                <p class="wishlist-intro">Treatment yang kamu sukai tersimpan di sini. Tambahkan dari halaman <a href="{{ route('treatment') }}">Layanan</a> dengan menekan ikon hati.</p>
            </header>

            <p class="wishlist-summary" id="wishlist-summary"></p>

            <div class="layanan-grid" id="wishlist-grid" aria-live="polite"></div>

            <div class="wishlist-empty" id="wishlist-empty">
                <span class="wishlist-empty-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>
                </span>
                <h2>Belum ada treatment favorit</h2>
                <p>Klik ikon hati pada kartu treatment di halaman Layanan, lalu treatment akan otomatis tersimpan di sini.</p>
                <a class="layanan-action is-primary" href="{{ route('treatment') }}">Lihat Layanan</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const treatments = @json($services);
            const wishlistSlugs = @json($wishlistSlugs);
            const toggleUrl = @json(route('wishlist.toggle'));
            const csrfToken = @json(csrf_token());

            const escapeHtml = (value) => String(value).replace(/[&<>"']/g, (char) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;',
            }[char]));

            const heartIcon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>';
            const clockIcon = '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>';

            const cardHtml = (service) => `
                <article class="layanan-card" data-slug="${escapeHtml(service.slug)}">
                    <div class="layanan-media">
                        <img src="${escapeHtml(service.image)}" alt="${escapeHtml(service.alt)}" loading="lazy">
                        <span class="layanan-badge">${escapeHtml(service.category)}</span>
                        <button class="layanan-favorite is-active" type="button" data-wishlist-remove="${escapeHtml(service.slug)}" data-wishlist-url="${escapeHtml(toggleUrl)}" data-wishlist-csrf="${escapeHtml(csrfToken)}" aria-label="Hapus ${escapeHtml(service.title)} dari wishlist" aria-pressed="true">
                            ${heartIcon}
                        </button>
                    </div>
                    <div class="layanan-body">
                        <h2>${escapeHtml(service.title)}</h2>
                        <p>${escapeHtml(service.description)}</p>
                        <div class="layanan-meta">
                            <span class="layanan-duration">${clockIcon} ${escapeHtml(service.duration)}</span>
                            <span class="layanan-price">${escapeHtml(service.price)}</span>
                        </div>
                        <a class="layanan-action${service.primary ? ' is-primary' : ''}" href="${escapeHtml(url('/booking'))}?treatment=${encodeURIComponent(service.slug)}">${escapeHtml(service.action)}</a>
                    </div>
                </article>
            `;

            async function removeFromWishlist(slug, button) {
                const url = button.dataset.wishlistUrl;
                const csrfToken = button.dataset.wishlistCsrf;

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({ slug }),
                    });

                    if (response.ok) {
                        renderWishlist();
                    }
                } catch (error) {
                    console.error('Gagal menghapus dari wishlist:', error);
                }
            }

            const renderWishlist = () => {
                const grid = document.getElementById('wishlist-grid');
                const empty = document.getElementById('wishlist-empty');
                const summary = document.getElementById('wishlist-summary');
                const selected = treatments.filter((service) => wishlistSlugs.includes(service.slug));

                grid.innerHTML = selected.map(cardHtml).join('');
                empty.hidden = selected.length > 0;
                summary.textContent = selected.length > 0
                    ? `${selected.length} treatment tersimpan di wishlist kamu.`
                    : '';

                grid.querySelectorAll('[data-wishlist-remove]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const slug = button.dataset.wishlistRemove;
                        removeFromWishlist(slug, button);
                    });
                });
            };

            document.addEventListener('DOMContentLoaded', () => {
                renderWishlist();
            });
        })();
    </script>
@endpush
