<section class="section testimonial-section" id="testimoni">
    <div class="container">
        <div class="section-heading section-heading-centered">
            <span class="eyebrow">Kata mereka tentang kami</span>
            <h2>Apa kata <em>mereka?</em></h2>
            <div class="rating-line"><span aria-label="5 dari 5 bintang">★★★★★</span> Perasaan baik dibagikan bersama</div>
        </div>
        <div class="testimonial-grid">
            @foreach ($testimonials as $testimonial)
                <article class="quote-card">
                    <span class="quote-stars" aria-label="5 dari 5 bintang">★★★★★</span>
                    <blockquote>“{{ $testimonial['quote'] }}”</blockquote>
                    <div class="quote-author">
                        <span class="quote-avatar">{{ $testimonial['initial'] }}</span>
                        <span><strong>{{ $testimonial['name'] }}</strong><small>{{ $testimonial['detail'] }}</small></span>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="demo-note">Testimoni di atas adalah konten contoh untuk keperluan tampilan.</p>
    </div>
</section>
