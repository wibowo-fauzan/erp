<section class="featured-section">
    <div class="container">
        <article class="featured-card">
            <div class="featured-image">
                <img src="{{ $featuredTreatment['image'] }}" alt="{{ $featuredTreatment['alt'] }}" loading="lazy">
                <span class="featured-image-label">OETA BEAUTY CARE</span>
            </div>
            <div class="featured-copy">
                <span class="eyebrow">Ritual pilihan · pengalaman premium</span>
                <h2>{{ $featuredTreatment['name'] }}</h2>
                <p>{{ $featuredTreatment['description'] }}</p>
                <ul>
                    @foreach ($featuredTreatment['benefits'] as $benefit)
                        <li><span aria-hidden="true">✓</span>{{ $benefit }}</li>
                    @endforeach
                </ul>
                <a class="button button-pink" href="{{ route('register') }}">Kenali perawatannya <span aria-hidden="true">↗</span></a>
            </div>
        </article>
    </div>
</section>
