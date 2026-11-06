<?php
    $features = [
        ['label' => 'Aman & Terpercaya', 'description' => 'Klinik terlisensi & terstandar', 'icon' => 'shield'],
        ['label' => 'Terapis Profesional', 'description' => 'Ditangani tenaga ahli bersertifikat', 'icon' => 'user'],
        ['label' => 'Hasil Optimal', 'description' => 'Teknologi modern & produk klinis', 'icon' => 'star'],
    ];

    $services = [
        ['name' => 'Facial Treatments', 'description' => 'Perawatan mendalam untuk kulit segar, cerah, dan sehat setiap hari.', 'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=700&q=85', 'alt' => 'Perawatan facial mendalam'],
        ['name' => 'Acne Care', 'description' => 'Solusi efektif untuk mengatasi jerawat dan mencegah bekasnya.', 'image' => 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=700&q=85', 'alt' => 'Produk perawatan jerawat'],
        ['name' => 'Brightening', 'description' => 'Mencerahkan kulit kusam dan meratakan warna wajah secara bertahap.', 'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=700&q=85', 'alt' => 'Produk pencerah kulit'],
        ['name' => 'Anti Aging', 'description' => 'Menunda tanda penuaan dan menjaga kekenyalan kulit Anda.', 'image' => 'https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=700&q=85', 'alt' => 'Perawatan anti aging'],
    ];

    $reasons = [
        ['title' => 'Konsultasi Personal', 'description' => 'Setiap treatment dimulai dengan analisis mendalam kondisi kulit Anda bersama dokter kami.'],
        ['title' => 'Produk Berkualitas', 'description' => 'Kami hanya menggunakan produk premium yang sudah teruji klinis dan aman untuk kulit.'],
        ['title' => 'Teknologi Modern', 'description' => 'Dilengkapi dengan alat estetika bertaraf internasional untuk hasil yang cepat dan tepat.'],
        ['title' => 'Harga Terjangkau', 'description' => 'Kualitas premium kini bisa dinikmati oleh siapa saja dengan harga yang kompetitif.'],
    ];

    $promotions = [
        ['flag' => 'Paket Hemat', 'title' => 'Paket Glow Brightening', 'description' => 'Nikmati kombinasi facial dan masker pencerah untuk kulit cerah instan.', 'price' => 'Mulai Rp 199.000', 'action' => 'Ambil Promo', 'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=800&q=85', 'alt' => 'Rangkaian produk skincare pencerah'],
        ['flag' => 'Kuota Terbatas', 'title' => 'First Visit Discount', 'description' => 'Diskon 30% untuk kunjungan pertama Anda untuk treatment apapun.', 'price' => 'Diskon 30%', 'action' => 'Klaim Sekarang', 'image' => 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=800&q=85', 'alt' => 'Ruang perawatan untuk kunjungan pertama'],
        ['flag' => 'Momen Berdua', 'title' => 'BFF Beauty Day', 'description' => 'Ajak sahabatmu dan nikmati treatment berdua dengan harga spesial.', 'price' => 'Paket Rp 399.000', 'action' => 'Ajak Teman', 'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=800&q=85', 'alt' => 'Treatment berdua di ruang relaksasi'],
    ];

    $benefits = [
        'Deep Cleansing & Detox',
        '24K Gold Serum Infusion',
        'Anti-Aging Face Massage',
    ];

    $testimonials = [
        ['name' => 'Siska Amelia', 'role' => 'Pelanggan Setia', 'initials' => 'SA', 'quote' => 'Treatment Acne Care di Octa berhasil mengatasi jerawat yang mengganggu sekali. Tempatnya nyaman dan hasilnya luar biasa.'],
        ['name' => 'Riana Puspita', 'role' => 'Pelanggan Setia', 'initials' => 'RP', 'quote' => 'Kulit wajah saya jadi lebih cerah dan sehat setelah facial treatment di sini. Pelayanannya sangat profesional.'],
        ['name' => 'Elyzabeth Tanaya', 'role' => 'Member Premium', 'initials' => 'ET', 'quote' => 'Harga terjangkau dengan kualitas premium. Konsultasinya detail dan terapisnya benar-benar memahami kondisi kulit saya.'],
    ];

    $instaPosts = [
        ['image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=600&q=85', 'alt' => 'Perawatan facial di Octa Beauty Care'],
        ['image' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=600&q=85', 'alt' => 'Persiapan perawatan wajah'],
        ['image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=600&q=85', 'alt' => 'Produk skincare favorit'],
        ['image' => 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=600&q=85', 'alt' => 'Momen perawatan wajah'],
        ['image' => 'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?auto=format&fit=crop&w=600&q=85', 'alt' => 'Kulit sehat dan bercahaya'],
    ];
?>



<?php $__env->startSection('meta_title', 'Octa Beauty Care | Kulit Sehat, Cantik Setiap Hari'); ?>
<?php $__env->startSection('meta_description', 'Wujudkan impian kulit wajah yang cerah, sehat, dan bercahaya bersama para ahli perawatan Octa Beauty Care. Booking treatment facial, acne care, brightening, dan anti aging.'); ?>
<?php $__env->startSection('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85'); ?>

<?php $__env->startSection('content'); ?>
    <section class="octa-hero" aria-labelledby="hero-title">
        <div class="container octa-hero-grid">
            <div class="octa-hero-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Octa Face &amp; Beauty Care</span>
                <h1 id="hero-title">Kulit Sehat,<br><em>Cantik Setiap Hari</em></h1>
                <p class="octa-hero-desc">Wujudkan impian kulit wajah yang cerah, sehat, dan bercahaya bersama para ahli perawatan kami. Perawatan modern yang dirancang khusus untuk kebutuhan unik kulit Anda.</p>
                <div class="octa-hero-actions">
                    <a class="button button-pink" href="<?php echo e(route('booking.create')); ?>">Booking Sekarang</a>
                    <a class="octa-hero-link" href="#layanan">Lihat Layanan <span class="octa-hero-link-arrow" aria-hidden="true">→</span></a>
                </div>
            </div>
            <div class="octa-hero-art">
                <div class="octa-hero-main">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=900&q=90" alt="Perawatan wajah profesional di Octa Beauty Care" fetchpriority="high">
                </div>
                <div class="octa-hero-float octa-hero-float-expert">
                    <span class="octa-hero-float-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="8.5" r="3.5"/><path d="M5 20c0-3.5 3-5.8 7-5.8s7 2.3 7 5.8"/><path d="m9 12.5 1.8 1.8L15 10"/></svg>
                    </span>
                    <div>
                        <strong>Terapis Bersertifikat</strong>
                        <span>Ditangani tenaga ahli</span>
                    </div>
                </div>
                <div class="octa-hero-float octa-hero-float-clients">
                    <span class="octa-hero-float-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path class="octa-solid" d="M12 3.2l2.5 5.4 5.9.7-4.4 4 1.2 5.8-5.2-2.9-5.2 2.9 1.2-5.8-4.4-4 5.9-.7L12 3.2Z"/></svg>
                    </span>
                    <div>
                        <strong>10k+</strong>
                        <span>Pelanggan Puas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="octa-strip" aria-label="Keunggulan Octa Beauty Care">
        <div class="container octa-strip-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="octa-strip-item">
                    <span class="octa-strip-icon" aria-hidden="true">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feature['icon'] === 'shield'): ?>
                            <svg viewBox="0 0 24 24"><path d="M12 3l7 3v5.5c0 4.4-3 7.3-7 8.5-4-1.2-7-4.1-7-8.5V6l7-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                        <?php elseif($feature['icon'] === 'user'): ?>
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.6"/><path d="M4.5 20.5c0-3.7 3.3-6 7.5-6s7.5 2.3 7.5 6"/><path d="M9.5 13.4 9 20.5M14.5 13.4l.5 7.1"/></svg>
                        <?php else: ?>
                            <svg viewBox="0 0 24 24"><path class="octa-solid" d="M12 3.2l2.5 5.4 5.9.7-4.4 4 1.2 5.8-5.2-2.9-5.2 2.9 1.2-5.8-4.4-4 5.9-.7L12 3.2Z"/></svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <div>
                        <strong><?php echo e($feature['label']); ?></strong>
                        <span><?php echo e($feature['description']); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="octa-services" id="layanan" aria-labelledby="layanan-title">
        <div class="container">
            <div class="octa-section-head">
                <div>
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Layanan Kami</span>
                    <h2 id="layanan-title">Layanan <em>Unggulan</em> Kami</h2>
                    <p class="octa-section-desc">Berbagai pilihan treatment yang dirancang untuk memberikan hasil maksimal bagi kesehatan dan keindahan kulit Anda.</p>
                </div>
                <a class="octa-link-more" href="<?php echo e(route('treatment')); ?>">Lihat Selengkapnya <span aria-hidden="true">→</span></a>
            </div>
            <div class="octa-service-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="octa-service-card">
                        <div class="octa-service-media">
                            <img src="<?php echo e($service['image']); ?>" alt="<?php echo e($service['alt']); ?>" loading="lazy">
                        </div>
                        <div class="octa-service-body">
                            <h3><?php echo e($service['name']); ?></h3>
                            <p><?php echo e($service['description']); ?></p>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="octa-why" aria-labelledby="why-title">
        <div class="container octa-why-grid">
            <div class="octa-why-art">
                <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=1000&q=85" alt="Ruang perawatan modern Octa Beauty Care" loading="lazy">
                <div class="octa-why-badge">
                    <strong>10k+</strong>
                    <span>Happy Clients<br>Kulit mereka bercahaya bersama Octa</span>
                </div>
            </div>
            <div class="octa-why-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Kenapa Memilih Kami</span>
                <h2 id="why-title">Kenapa Memilih <em>Octa Beauty Care?</em></h2>
                <p>Kami menggabungkan teknologi modern dengan perawatan ahli untuk hasil yang terbaik bagi kulit Anda.</p>
                <ul class="octa-why-list">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="octa-why-item">
                            <span class="octa-check" aria-hidden="true">
                                <svg viewBox="0 0 24 24"><path d="m5 13 4 4L19 7"/></svg>
                            </span>
                            <div>
                                <h3><?php echo e($reason['title']); ?></h3>
                                <p><?php echo e($reason['description']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="octa-promo" id="promo" aria-labelledby="promo-title">
        <div class="container">
            <div class="octa-promo-head">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Penawaran Spesial</span>
                <h2 id="promo-title">Promo Spesial <em>Bulan Ini</em></h2>
                <p>Jangan lewatkan kesempatan untuk mendapatkan perawatan terbaik dengan harga hemat.</p>
            </div>
            <div class="octa-promo-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="octa-promo-card">
                        <div class="octa-promo-media">
                            <img src="<?php echo e($promo['image']); ?>" alt="<?php echo e($promo['alt']); ?>" loading="lazy">
                            <span class="octa-promo-flag"><?php echo e($promo['flag']); ?></span>
                        </div>
                        <div class="octa-promo-body">
                            <h3><?php echo e($promo['title']); ?></h3>
                            <p><?php echo e($promo['description']); ?></p>
                            <div class="octa-promo-foot">
                                <span class="octa-promo-price"><?php echo e($promo['price']); ?></span>
                                <a class="octa-promo-btn" href="<?php echo e(route('promo')); ?>#promo-berjalan"><?php echo e($promo['action']); ?></a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="octa-featured" aria-labelledby="featured-title">
        <div class="container">
            <div class="octa-featured-card">
                <div class="octa-featured-media">
                    <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=90" alt="Octa Royal Gold Facial treatment" loading="lazy">
                </div>
                <div class="octa-featured-copy">
                    <span class="eyebrow">Premium Treatment</span>
                    <h2 id="featured-title">Octa Royal Gold Facial</h2>
                    <p>Manjakan diri Anda dengan treatment paling mewah kami. Menggunakan partikel emas 24 karat untuk mencerahkan, mengencangkan, dan memberikan kilau natural pada wajah Anda.</p>
                    <ul class="octa-featured-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <span class="octa-check" aria-hidden="true">
                                    <svg viewBox="0 0 24 24"><path d="m5 13 4 4L19 7"/></svg>
                                </span>
                                <?php echo e($benefit); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                    <a class="button button-pink" href="<?php echo e(route('booking.create', ['treatment' => 'octa-signature-glow'])); ?>">Booking Treatment Ini</a>
                </div>
            </div>
        </div>
    </section>

    <section class="octa-testi" aria-labelledby="testi-title">
        <div class="container">
            <div class="octa-testi-head">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Testimoni</span>
                <h2 id="testi-title">Apa Kata <em>Mereka?</em></h2>
                <p>Ribuan perempuan puas dengan transformasi kulit mereka di Octa Beauty Care.</p>
            </div>
            <div class="octa-testi-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="octa-testi-card">
                        <div class="octa-testi-stars" aria-label="Rating 5 dari 5">★★★★★</div>
                        <blockquote><?php echo e($testimonial['quote']); ?></blockquote>
                        <div class="octa-testi-author">
                            <span class="octa-testi-avatar" aria-hidden="true"><?php echo e($testimonial['initials']); ?></span>
                            <div>
                                <strong><?php echo e($testimonial['name']); ?></strong>
                                <span><?php echo e($testimonial['role']); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="octa-insta" id="artikel" aria-labelledby="insta-title">
        <div class="container">
            <div class="octa-insta-head">
                <div>
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Instagram</span>
                    <h2 id="insta-title">Follow Kami di <em>Instagram</em></h2>
                </div>
                <a class="octa-insta-btn" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/></svg>
                    @octabeauty
                </a>
            </div>
            <div class="octa-insta-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $instaPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="octa-insta-item" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo e($post['image']); ?>" alt="<?php echo e($post['alt']); ?>" loading="lazy">
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="octa-cta" aria-labelledby="cta-title">
        <div class="container">
            <div class="octa-cta-card">
                <div class="octa-cta-inner">
                    <h2 id="cta-title">Siap Merawat <em>Kulitmu?</em></h2>
                    <p>Konsultasikan masalah kulitmu secara GRATIS dan temukan kembali rasa percaya dirimu bersama kami.</p>
                    <div class="octa-cta-actions">
                        <a class="button button-light" href="<?php echo e(route('booking.create')); ?>">Booking Sekarang</a>
                        <a class="button octa-cta-wa" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\beranda.blade.php ENDPATH**/ ?>