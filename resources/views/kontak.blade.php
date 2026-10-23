@php
    $channels = [
        ['title' => 'Telepon', 'description' => 'Butuh respons cepat? Hubungi kami langsung.', 'value' => '+62 21 8888 8888', 'href' => 'tel:+622188888888', 'icon' => 'phone'],
        ['title' => 'WhatsApp', 'description' => 'Konsultasi via chat lebih nyaman.', 'value' => '0812 3456 7890', 'href' => 'https://wa.me/6281234567890', 'icon' => 'whatsapp'],
        ['title' => 'Instagram', 'description' => 'Update harian & hasil perawatan.', 'value' => '@octabeauty.care', 'href' => 'https://www.instagram.com/', 'icon' => 'instagram'],
        ['title' => 'Alamat', 'description' => 'Kunjungi klinik kami di Jakarta.', 'value' => 'Lihat di Google Maps', 'href' => 'https://www.google.com/maps/search/?api=1&query=Octa+Beauty+Care+Ciracas+Jakarta+Timur', 'icon' => 'pin'],
    ];

    $operationalHours = [
        ['days' => 'Senin - Jumat', 'time' => '09:00 - 20:00'],
        ['days' => 'Sabtu - Minggu', 'time' => '09:00 - 18:00'],
    ];

    $questions = [
        ['question' => 'Apakah perlu buat konsultasi sebelum treatment?', 'answer' => 'Ya, setiap pasien baru wajib melakukan konsultasi kulit dengan dokter kami.'],
        ['question' => 'Apakah Octa Beauty punya layanan homecare?', 'answer' => 'Saat ini kami hanya melayani treatment langsung di klinik kami.'],
    ];

    $addressLines = [
        'Jl. raya Centex rt 11/10 no 66, RT.11/RW.10,',
        'Ciracas, Kec. Ciracas, Kota Jakarta Timur,',
        'Daerah Khusus Ibukota Jakarta',
    ];

    $showcasePoints = [
        'Tim kami siap membantu pertanyaan dan kebutuhan perawatan Anda.',
        'Konsultasi awal selaluponding, tanpa biaya.',
        'Lokasi mudah dijangkau di Ciracas, Jakarta Timur.',
    ];

    $whatsappNumber = '6281234567890';
@endphp

@extends('layouts.website')

@section('meta_title', 'Kontak | Octa Beauty Care')
@section('meta_description', 'Hubungi Octa Beauty Care Ciracas. Telepon, WhatsApp, Instagram, jam operasional, form pesan, dan peta lokasi klinik kami di Jakarta Timur.')
@section('meta_image', 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=1200&h=630&q=85')

@section('content')
    <section class="contact-hero kontak-hero-page" aria-labelledby="kontak-title">
        <div class="container contact-hero-inner">
            <span class="contact-hero-eyebrow"><span class="eyebrow-dot"></span> Kontak</span>
            <h1 id="kontak-title">Hubungi Octa Beauty Care</h1>
            <p>Kami siap membantu menjawab pertanyaan dan kebutuhan perawatan kecantikanmu. Pilih cara yang paling nyaman untuk Anda menghubungi tim kami.</p>
            <div class="kontak-quick">
                <a class="kontak-quick-item" href="tel:+622188888888">
                    <span class="kontak-quick-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M5 3h3l2 5-2.5 1.5a12 12 0 0 0 6 6L15 13l5 2v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 3 5.2 2 2 0 0 1 5 3Z"/></svg>
                    </span>
                    <span>
                        <small>Telepon</small>
                        <strong>+62 21 8888 8888</strong>
                    </span>
                </a>
                <a class="kontak-quick-item" href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer">
                    <span class="kontak-quick-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z"/></svg>
                    </span>
                    <span>
                        <small>WhatsApp</small>
                        <strong>0812 3456 7890</strong>
                    </span>
                </a>
                <a class="kontak-quick-item" href="{{ route('booking.create') }}">
                    <span class="kontak-quick-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                    </span>
                    <span>
                        <small>Booking</small>
                        <strong>Pilih Jadwal</strong>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section class="contact-channels kontak-channels-page" aria-label="Kontak Octa Beauty Care">
        <div class="container contact-channels-grid">
            @foreach ($channels as $channel)
                <article class="contact-card">
                    <span class="contact-card-icon" aria-hidden="true">
                        @if ($channel['icon'] === 'phone')
                            <svg viewBox="0 0 24 24"><path d="M5 3h3l2 5-2.5 1.5a12 12 0 0 0 6 6L15 13l5 2v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 3 5.2 2 2 0 0 1 5 3Z"/></svg>
                        @elseif ($channel['icon'] === 'whatsapp')
                            <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z"/></svg>
                        @elseif ($channel['icon'] === 'instagram')
                            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/></svg>
                        @else
                            <svg viewBox="0 0 24 24"><path d="M12 21s7-6.3 7-11a7 7 0 1 0-14 0c0 4.7 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/></svg>
                        @endif
                    </span>
                    <h2>{{ $channel['title'] }}</h2>
                    <p>{{ $channel['description'] }}</p>
                    <a class="contact-card-value" href="{{ $channel['href'] }}" @if (str_starts_with($channel['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif>{{ $channel['value'] }}</a>
                </article>
            @endforeach
        </div>
    </section>

    <section class="kontak-showcase" aria-labelledby="kontak-showcase-title">
        <div class="container kontak-showcase-grid">
            <div class="kontak-showcase-media">
                <div class="kontak-showcase-frame">
                    <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=85" alt="Ruang tunggu Octa Beauty Care di Ciracas, Jakarta Timur" width="900" height="1125">
                </div>
                <div class="kontak-showcase-stripe">
                    <a href="tel:+622188888888" aria-label="Telepon Octa Beauty Care">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h3l2 5-2.5 1.5a12 12 0 0 0 6 6L15 13l5 2v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 3 5.2 2 2 0 0 1 5 3Z"/></svg>
                    </a>
                    <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp Octa Beauty Care">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z"/></svg>
                    </a>
                </div>
            </div>

            <div class="kontak-showcase-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Octa Beauty Care</span>
                <h2 id="kontak-showcase-title">Datang, ngobrol, dan biar kulitmu makin sehat</h2>
                <p> Klinik kami berada di Ciracas, Jakarta Timur. Jadwal konsultasi selalu tersedia, dan tim kami akan menyiapkan rencana perawatan sesuai kondisi kulit Anda.</p>
                <ul class="kontak-showcase-list">
                    @foreach ($showcasePoints as $point)
                        <li>
                            <span class="kontak-check" aria-hidden="true">
                                <svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg>
                            </span>
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
                <a class="kontak-showcase-cta" href="{{ route('booking.create') }}">
                    Booking Sekarang
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section class="kontak-warm" aria-labelledby="kontak-warm-title">
        <div class="container kontak-warm-grid">
            <article class="contact-form-card kontak-warm-card">
                <span class="kontak-warm-badge" aria-hidden="true">
                    <svg viewBox="0 0 40 40" fill="none">
                        <path d="M20 4.5c1.2 7.1 4.1 11.2 11.5 15.5C24.1 24.3 21.2 28.4 20 35.5 18.8 28.4 15.9 24.3 8.5 20 15.9 15.7 18.8 11.6 20 4.5Z" fill="currentColor"/>
                        <path d="M6 20h28" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <h2 id="kontak-warm-title">Kirim Pesan</h2>
                <p class="contact-form-intro">Isi formulir di bawah ini, kami akan segera menghubungi Anda lewat WhatsApp.</p>

                <form id="contact-form" class="contact-form" novalidate>
                    <div class="contact-form-grid">
                        <div class="contact-field">
                            <label for="kontak-name">Nama Lengkap</label>
                            <input class="contact-input" id="kontak-name" name="name" type="text" placeholder="Contoh: Amanda Octa" autocomplete="name" required>
                        </div>
                        <div class="contact-field">
                            <label for="kontak-email">Email</label>
                            <input class="contact-input" id="kontak-email" name="email" type="email" placeholder="amanda@email.com" autocomplete="email" required>
                        </div>
                        <div class="contact-field">
                            <label for="kontak-whatsapp">Nomor WhatsApp</label>
                            <input class="contact-input" id="kontak-whatsapp" name="whatsapp" type="tel" placeholder="0812xxx" autocomplete="tel" required>
                        </div>
                        <div class="contact-field">
                            <label for="kontak-subject">Subjek</label>
                            <input class="contact-input" id="kontak-subject" name="subject" type="text" placeholder="Tanya Treatment" required>
                        </div>
                        <div class="contact-field contact-field-full">
                            <label for="kontak-message">Pesan</label>
                            <textarea class="contact-input contact-textarea" id="kontak-message" name="message" rows="5" placeholder="Tuliskan pesan atau pertanyaanmu di sini..." required></textarea>
                        </div>
                    </div>
                    <button class="contact-submit" type="submit">
                        Kirim Pesan
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 20-7Z"/></svg>
                    </button>
                </form>
            </article>

            <div class="kontak-warm-aside">
                <article class="contact-hours">
                    <header class="contact-hours-head">
                        <h2>Jam Operasional</h2>
                    </header>
                    <ul class="contact-hours-list">
                        @foreach ($operationalHours as $hours)
                            <li class="contact-hours-row">
                                <span class="contact-hours-day">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                                    {{ $hours['days'] }}
                                </span>
                                <span class="contact-hours-time">{{ $hours['time'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="contact-hours-note">*Kami menyarankan untuk melakukan reservasi minimal 2 hari sebelumnya.</p>
                </article>

                <article class="contact-questions">
                    <h2>Punya Pertanyaan?</h2>
                    @foreach ($questions as $item)
                        <div class="contact-question">
                            <h3>{{ $item['question'] }}</h3>
                            <p>{{ $item['answer'] }}</p>
                        </div>
                    @endforeach
                    <a class="contact-questions-more" href="{{ route('faq') }}">Lihat FAQ Selengkapnya <span aria-hidden="true">&rarr;</span></a>
                </article>
            </div>
        </div>
    </section>

    <section class="contact-map-section" aria-labelledby="kontak-map-title">
        <div class="container">
            <h2 class="sr-only" id="kontak-map-title">Lokasi Octa Beauty Care</h2>
            <div class="contact-map">
                <svg class="contact-map-art" viewBox="0 0 1200 470" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Ilustrasi peta lokasi Octa Beauty Care di kawasan Jakarta">
                    <rect width="1200" height="470" fill="#f6e9d9"/>
                    <path d="M712 -20c132 30 190 150 154 262-36 112-24 150 44 228H712V-20Z" fill="#eeddc4"/>
                    <path d="M-20 352c150-46 330 6 470-24 150-32 300 18 450-8v170H-20V352Z" fill="#f0e0c8"/>
                    <path d="M900 40c72 18 108 84 96 146-12 62 30 96 84 92v-238H900V40Z" fill="#e9d5b9"/>
                    <g fill="none" stroke="#fff" stroke-linecap="round">
                        <path d="M-20 268c210-42 402 52 606 8 204-44 424-96 634-52" stroke-width="11"/>
                        <path d="M-20 118c214 56 404-52 622 4 218 56 396 92 598 56" stroke-width="9"/>
                        <path d="M318 -20c52 158-8 288 32 490" stroke-width="10"/>
                        <path d="M918 -20c-42 150 30 296-6 490" stroke-width="10"/>
                        <circle cx="600" cy="168" r="96" stroke-width="11"/>
                        <path d="M600 -20v52M600 284v206M120 404h236M772 372h214M1046 118h174" stroke-width="6"/>
                        <path d="M120 50h150M1040 380h160" stroke-width="6"/>
                    </g>
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4" opacity=".9">
                        <path d="M470 420h170M700 62h120M170 190h110M980 226h120M380 96h120"/>
                    </g>
                    <text class="contact-map-label" x="836" y="306" fill="#7c6853">Jakarta</text>
                    <text class="contact-map-sub" x="842" y="338" fill="#a48d75">Area</text>
                    <g class="contact-map-pin">
                        <path d="M600 232c-24-28-44-46-44-72a44 44 0 1 1 88 0c0 26-20 44-44 72Z" fill="#e05252"/>
                        <circle cx="600" cy="158" r="17" fill="#fff"/>
                    </g>
                    <g class="contact-map-tag">
                        <circle cx="452" cy="146" r="6" fill="#f45b8a"/>
                        <text x="470" y="154" fill="#4c4239">Octa</text>
                        <text class="contact-map-tag-sub" x="470" y="184" fill="#6f6155">Beauty Care</text>
                    </g>
                </svg>

                <div class="contact-map-card">
                    <span class="contact-map-eyebrow"><span class="eyebrow-dot"></span> Lokasi Kami</span>
                    <h2 class="contact-map-title">Octa Beauty Care</h2>
                    <p class="contact-map-address">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6.3 7-11a7 7 0 1 0-14 0c0 4.7 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/></svg>
                        <span>
                            @foreach ($addressLines as $line)
                                {{ $line }}<br>
                            @endforeach
                        </span>
                    </p>
                    <div class="contact-map-actions">
                        <a class="button button-pink contact-map-button" href="https://www.google.com/maps/search/?api=1&query=Octa+Beauty+Care+Ciracas+Jakarta+Timur" target="_blank" rel="noopener noreferrer">Petunjuk Arah</a>
                        <button class="contact-map-copy" id="copy-address" type="button" aria-label="Salin alamat klinik" title="Salin alamat">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M5 15V6a2 2 0 0 1 2-2h9"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (() => {
            const whatsappNumber = '{{ $whatsappNumber }}';

            const form = document.getElementById('contact-form');
            if (form) {
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    if (!form.reportValidity()) {
                        return;
                    }

                    const data = new FormData(form);
                    const value = (key) => (data.get(key) || '').toString().trim();
                    const lines = [
                        'Halo Octa Beauty Care, saya ingin mengirim pesan.',
                        '',
                        `Nama: ${value('name')}`,
                        `Email: ${value('email')}`,
                        `WhatsApp: ${value('whatsapp')}`,
                        `Subjek: ${value('subject')}`,
                        '',
                        `Pesan: ${value('message')}`,
                    ];
                    const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(lines.join('\n'))}`;
                    window.open(url, '_blank', 'noopener');
                });
            }

            const copyButton = document.getElementById('copy-address');
            if (copyButton) {
                copyButton.addEventListener('click', async () => {
                    const address = 'Octa Beauty Care, Jl.raya Centex rt 11/10 no 66, RT.11/RW.10, Ciracas, Kec. Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta';
                    try {
                        await navigator.clipboard.writeText(address);
                        copyButton.classList.add('is-copied');
                        copyButton.setAttribute('aria-label', 'Alamat tersalin');
                        window.setTimeout(() => {
                            copyButton.classList.remove('is-copied');
                            copyButton.setAttribute('aria-label', 'Salin alamat klinik');
                        }, 2000);
                    } catch (error) {
                        window.open('https://www.google.com/maps/search/?api=1&query=Octa+Beauty+Care+Ciracas+Jakarta+Timur', '_blank', 'noopener');
                    }
                });
            }
        })();
    </script>
@endpush
