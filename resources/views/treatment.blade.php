@php
    $services = config('treatments');

    $filters = [
        'semua' => 'Semua',
        'facial' => 'Facial',
        'acne' => 'Acne',
        'brightening' => 'Brightening',
        'anti-aging' => 'Anti Aging',
        'body' => 'Body Treatment',
    ];
@endphp

@extends('layouts.website')

@section('meta_title', 'Layanan Perawatan | Octa Beauty Care')
@section('meta_description', 'Tempat di mana perawatan profesional bertemu dengan kenyamanan. Pilih treatment facial, brightening, anti aging, dan konsultasi analisis kulit di Octa Beauty Care.')
@section('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85')

@section('content')
    <section class="treatment-page">
        <div class="treatment-hero">
            <div class="container treatment-hero-inner">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Our Signature Treatments</span>
                <h1>Layanan Perawatan</h1>
                <p>Tempat di mana perawatan profesional bertemu dengan kenyamanan. Pilih treatment yang paling sesuai untuk kesehatan dan kecantikan kulit Anda.</p>
            </div>
            <span class="treatment-hero-flower treatment-hero-flower-left" aria-hidden="true">&#10047;</span>
            <span class="treatment-hero-flower treatment-hero-flower-right" aria-hidden="true">&#10047;</span>
        </div>

        <div class="layanan-filters" role="group" aria-label="Filter kategori treatment">
            @foreach ($filters as $value => $label)
                <button class="treatment-filter @if ($loop->first) is-active @endif" type="button" data-filter="{{ $value }}">{{ $label }}</button>
            @endforeach
        </div>

        <div class="container layanan-catalog">
            <h2 class="sr-only">Daftar Treatment</h2>
            <div class="layanan-grid">
                @foreach ($services as $service)
                    <article class="layanan-card" data-filter="{{ $service['filter'] }}" data-slug="{{ $service['slug'] }}">
                        <div class="layanan-media">
                            <img src="{{ $service['image'] }}" alt="{{ $service['alt'] }}" loading="lazy">
                            <span class="layanan-badge">{{ $service['category'] }}</span>
                            <button class="layanan-favorite" type="button" data-wishlist-toggle="{{ $service['slug'] }}" aria-label="Tambahkan {{ $service['title'] }} ke wishlist" aria-pressed="false">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>
                            </button>
                        </div>
                        <div class="layanan-body">
                            <h3>{{ $service['title'] }}</h3>
                            <p>{{ $service['description'] }}</p>
                            <div class="layanan-meta">
                                <span class="layanan-duration">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                                    {{ $service['duration'] }}
                                </span>
                                <span class="layanan-price">{{ $service['price'] }}</span>
                            </div>
                            <a class="layanan-action @if ($service['primary']) is-primary @endif" href="{{ route('booking.create', ['treatment' => $service['slug']]) }}">{{ $service['action'] }}</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="treatment-empty" id="layanan-empty" hidden>Belum ada treatment untuk kategori ini.</p>
        </div>

        <div class="treatment-consult">
            <div class="container">
                <div class="treatment-consult-card">
                    <div class="treatment-consult-copy">
                        <span class="eyebrow">Need Help?</span>
                        <h2>Belum Tahu Treatment yang Cocok?</h2>
                        <p>Setiap jenis kulit memiliki kebutuhan yang unik. Tim ahli kami siap membantu Anda melakukan analisis kulit menyeluruh untuk menentukan perawatan terbaik yang memberikan hasil maksimal tanpa efek sampling.</p>
                        <div class="treatment-consult-actions">
                            <a class="button button-pink" href="{{ route('booking.create', ['treatment' => 'expert-skin-analysis']) }}">Konsultasi Sekarang <span aria-hidden="true">&rarr;</span></a>
                            <a class="treatment-consult-wa" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Hubungi Lewat WhatsApp</a>
                        </div>
                    </div>
                    <div class="treatment-consult-art">
                        <div class="treatment-consult-image">
                            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=900&q=85" alt="Ruang treatment modern Octa Beauty Care" loading="lazy">
                        </div>
                        <span class="treatment-consult-spark" aria-hidden="true">&#10022;</span>
                        <span class="treatment-consult-label">Octa Beauty Care</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const wishlistKey = 'octa.wishlist';

            const readWishlist = () => {
                try {
                    const items = JSON.parse(localStorage.getItem(wishlistKey) || '[]');

                    return Array.isArray(items) ? items : [];
                } catch (error) {
                    return [];
                }
            };

            const writeWishlist = (items) => {
                localStorage.setItem(wishlistKey, JSON.stringify(items));
                window.dispatchEvent(new Event('octa:wishlist-updated'));
            };

            const syncWishlistButtons = () => {
                const items = readWishlist();

                document.querySelectorAll('[data-wishlist-toggle]').forEach((button) => {
                    const active = items.includes(button.dataset.wishlistToggle);
                    button.classList.toggle('is-active', active);
                    button.setAttribute('aria-pressed', active ? 'true' : 'false');
                    button.setAttribute('aria-label', active ? 'Hapus dari wishlist' : 'Tambahkan ke wishlist');
                });
            };

            const filterButtons = () => Array.from(document.querySelectorAll('.treatment-filter'));
            const cards = () => Array.from(document.querySelectorAll('.layanan-card[data-filter]'));

            const applyFilter = (filter) => {
                const visible = cards().filter((card) => filter === 'semua' || card.dataset.filter === filter);
                const empty = document.getElementById('layanan-empty');

                cards().forEach((card) => {
                    card.hidden = !visible.includes(card);
                });

                if (empty) {
                    empty.hidden = visible.length > 0;
                }
            };

            document.addEventListener('DOMContentLoaded', () => {
                syncWishlistButtons();

                filterButtons().forEach((button) => {
                    button.addEventListener('click', () => {
                        filterButtons().forEach((item) => item.classList.remove('is-active'));
                        button.classList.add('is-active');
                        applyFilter(button.dataset.filter);
                    });
                });

                document.querySelectorAll('[data-wishlist-toggle]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const slug = button.dataset.wishlistToggle;
                        const items = readWishlist();
                        const index = items.indexOf(slug);

                        if (index === -1) {
                            items.push(slug);
                        } else {
                            items.splice(index, 1);
                        }

                        writeWishlist(items);
                        syncWishlistButtons();
                    });
                });
            });
        })();
    </script>
@endpush
