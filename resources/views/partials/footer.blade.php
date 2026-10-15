<footer class="site-footer" id="kontak">
    <div class="container footer-main">
        <div class="footer-about">
            <a class="brand brand-footer" href="{{ route('home') }}" aria-label="Octa Beauty Care - Beranda">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 40 40" fill="none">
                        <path d="M20 4.5c1.2 7.1 4.1 11.2 11.5 15.5C24.1 24.3 21.2 28.4 20 35.5 18.8 28.4 15.9 24.3 8.5 20 15.9 15.7 18.8 11.6 20 4.5Z" fill="currentColor"/>
                        <path d="M6 20h28" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="brand-copy">Octa <span>Beauty</span></span>
            </a>
            <p>Dedicated to bringing out your inner radiance through expert facial care and premium aesthetic treatments.</p>
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
                <a class="footer-social-icon" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z" fill="currentColor" stroke="none"/></svg>
                </a>
            </div>
        </div>

        <div class="footer-column">
            <h2>Quick Links</h2>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('home') }}#layanan">Layanan</a>
            <a href="{{ route('home') }}#promo">Promo</a>
            <a href="{{ route('home') }}#artikel">Artikel</a>
            <a href="{{ route('home') }}#kontak">FAQ</a>
        </div>

        <div class="footer-column">
            <h2>Layanan Kami</h2>
            <a href="{{ route('home') }}#layanan">Facial Glow</a>
            <a href="{{ route('home') }}#layanan">Laser Therapy</a>
            <a href="{{ route('home') }}#layanan">Acne Solution</a>
            <a href="{{ route('home') }}#layanan">Peeling</a>
            <a href="{{ route('home') }}#layanan">Eye Care</a>
        </div>

        <div class="footer-contact">
            <h2>Kontak Kami</h2>
            <ul class="footer-contact-list">
                <li>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6.3 7-11a7 7 0 1 0-14 0c0 4.7 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/></svg>
                    <span>Jl. Melati No. 123, Kebayoran Baru,<br>Jakarta Selatan, 12150</span>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3h3l2 5-2.5 1.5a12 12 0 0 0 6 6L15 13l5 2v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 3 5.2 2 2 0 0 1 5 3Z"/></svg>
                    <a href="tel:+6281234567890">+62 812 3456 7890</a>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                    <a href="mailto:hello@octabeauty.com">hello@octabeauty.com</a>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                    <span>Senin - Minggu: 09.00 - 20.00</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <span>© {{ now()->year }} Octa Face &amp; Beauty Care. All rights reserved.</span>
        <span class="footer-legal">
            <a href="#kontak">Privacy Policy</a>
            <a href="#kontak">Terms of Service</a>
        </span>
    </div>
</footer>
