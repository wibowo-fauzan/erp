<section class="section articles-section" id="artikel">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">Catatan kecil untukmu</span>
                <h2>Edukasi kecil <em>untukmu.</em></h2>
                <p class="section-intro">Inspirasi ringan seputar perawatan kulit dan waktu untuk diri sendiri.</p>
            </div>
            <a class="button button-pink button-small" href="https://www.instagram.com/" target="_blank" rel="noreferrer">Ikuti Instagram <span aria-hidden="true">↗</span></a>
        </div>
        <div class="article-grid">
            @foreach ($articles as $article)
                <article class="article-card">
                    <div class="article-image">
                        <img src="{{ $article['image'] }}" alt="{{ $article['alt'] }}" loading="lazy">
                    </div>
                    <span class="article-category">{{ $article['category'] }}</span>
                    <h3>{{ $article['title'] }}</h3>
                    <p>{{ $article['excerpt'] }}</p>
                    <span class="article-link">Artikel segera hadir</span>
                </article>
            @endforeach
        </div>
        <p class="demo-note">Judul dan isi artikel masih berupa contoh.</p>
    </div>
</section>
