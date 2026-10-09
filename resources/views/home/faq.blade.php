<section class="section faq-section" id="faq">
    <div class="container faq-grid">
        <div>
            <span class="eyebrow">Ada yang ingin ditanyakan?</span>
            <h2>Pertanyaan <em>umum.</em></h2>
            <p class="faq-intro">Belum menemukan jawaban? Buat akun atau masuk untuk memulai perjalananmu bersama kami.</p>
            <a class="text-link" href="{{ route('register') }}">Mulai di Beauty Care <span aria-hidden="true">↗</span></a>
        </div>
        <div class="faq-list">
            @foreach ($faqs as $faq)
                <details class="faq-item">
                    <summary>{{ $faq['question'] }}<span aria-hidden="true">+</span></summary>
                    <p>{{ $faq['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>
