<?php
    $features = [
        ['label' => 'Aman & Terpercaya', 'description' => 'Klinik terlisensi & terstandar', 'icon' => 'shield'],
        ['label' => 'Terapis Profesional', 'description' => 'Ditangani tenaga ahli bersertifikat', 'icon' => 'user'],
        ['label' => 'Lisensi Klinik', 'description' => 'Terdaftar resmi & berizin sesuai peraturan', 'icon' => 'license'],
    ];

    $reasons = [
        ['title' => 'Konsultasi Personal', 'description' => 'Setiap treatment dimulai dengan analisis mendalam kondisi kulit Anda bersama dokter kami.'],
        ['title' => 'Produk Berkualitas', 'description' => 'Kami hanya menggunakan produk premium yang sudah teruji klinis dan aman untuk kulit.'],
        ['title' => 'Teknologi Modern', 'description' => 'Dilengkapi dengan alat estetika bertaraf internasional untuk hasil yang cepat dan tepat.'],
        ['title' => 'Harga Terjangkau', 'description' => 'Kualitas premium kini bisa dinikmati oleh siapa saja dengan harga yang kompetitif.'],
    ];

    $benefits = [
        'Deep Cleansing & Detox',
        '24K Gold Serum Infusion',
        'Anti-Aging Face Massage',
    ];

    $testimonials = [
        ['name' => 'Siska Amelia', 'role' => 'Pelanggan Setia', 'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=85', 'quote' => 'Treatment Acne Care di Octa berhasil mengatasi jerawat yang mengganggu sekali. Tempatnya nyaman dan hasilnya luar biasa.'],
        ['name' => 'Riana Puspita', 'role' => 'Pelanggan Setia', 'image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=120&h=120&q=85', 'quote' => 'Kulit wajah saya jadi lebih cerah dan sehat setelah facial treatment di sini. Pelayanannya sangat profesional.'],
        ['name' => 'Elyzabeth Tanaya', 'role' => 'Member Premium', 'image' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=120&h=120&q=85', 'quote' => 'Harga terjangkau dengan kualitas premium. Konsultasinya detail dan terapisnya benar-benar memahami kondisi kulit saya.'],
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
                            <div class="octa-strip-cert" aria-hidden="true">
                                <img src="<?php echo e(asset('images/octa-certificate.png')); ?>" alt="Sertifikat keahlian terapis Octa Beauty Care" data-modal="license-therapist" loading="lazy">
                            </div>
                        <?php elseif($feature['icon'] === 'license'): ?>
                            <svg viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M7 10h4M7 15h4M11 10h1M11 15h1"/></svg>
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
                            <span class="octa-service-price"><?php echo e(rupiah($service['price'])); ?></span>
                            <p><?php echo e($service['description']); ?></p>
                            <div class="octa-service-meta">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($service['duration'])): ?>
                                    <span class="octa-service-duration" aria-label="Durasi treatment <?php echo e($service['duration']); ?> menit">
                                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                                        <?php echo e($service['duration']); ?> menit
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($service['social_media'])): ?>
                                <div class="octa-service-social" aria-label="Media sosial <?php echo e($service['name']); ?>">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $service['social_media']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($url); ?>" class="octa-service-social-icon" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e(ucfirst($type)); ?>">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'instagram'): ?>
                                                    <rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/>
                                                <?php elseif($type === 'whatsapp'): ?>
                                                    <path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z"/>
                                                <?php elseif($type === 'facebook'): ?>
                                                    <path class="social-fill" d="M13.5 21v-8h2.7l.4-3.1h-3.1v-2c0-.9.3-1.5 1.6-1.5h1.7V3.6c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.2v2.2H7.5V13h2.8v8h3.2Z"/>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </svg>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                            <img class="octa-testi-avatar" src="<?php echo e($testimonial['image']); ?>" alt="" loading="lazy">
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

    <section class="octa-license" aria-labelledby="license-title">
        <div class="container">
            <div class="octa-license-head">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Legalitas & Kepercayaan</span>
                <h2 id="license-title">Lisensi dan <em>Sertifikat</em> Kami</h2>
                <p>Octa Beauty Care beroperasi dengan lisensi klinis resmi dan terapis yang bersertifikat. Klik gambar untuk melihat detailnya.</p>
            </div>
            <div class="octa-license-grid">
                <article class="octa-license-card" id="license-therapist">
                    <div class="octa-license-media" data-modal="license-therapist">
                        <img src="<?php echo e(asset('images/octa-certificate.png')); ?>" alt="Sertifikat kompetensi terapis Octa Beauty Care" loading="lazy">
                        <span class="octa-license-badge">Sertifikat Terapis</span>
                    </div>
                    <div class="octa-license-body">
                        <h3>Sertifikat Kompetensi Terapis</h3>
                        <p>Semua terapis Octa Beauty Care lulus sertifikasi perawatan kulit dan kecantikan dari lembaga terakreditasi.</p>
                        <a class="octa-license-link" href="#" data-modal="license-therapist">Lihat Sertifikat <span aria-hidden="true">→</span></a>
                    </div>
                </article>
                <article class="octa-license-card" id="license-clinic">
                    <div class="octa-license-media" data-modal="license-clinic">
                        <img src="<?php echo e(asset('images/octa-clinic-license.png')); ?>" alt="Lisensi operasional klinik Octa Beauty Care" loading="lazy">
                        <span class="octa-license-badge">Lisensi Klinik</span>
                    </div>
                    <div class="octa-license-body">
                        <h3>Lisensi Operasional Klinik</h3>
                        <p>Klinik kami terdaftar resmi dan berizin mengelola layanan perawatan kecantikan kulit sesuai peraturan yang berlaku.</p>
                        <a class="octa-license-link" href="#" data-modal="license-clinic">Lihat Lisensi <span aria-hidden="true">→</span></a>
                    </div>
                </article>
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

    <!-- Modal Sertifikat & Lisensi -->
    <div class="octa-modal" id="octa-modal" role="dialog" aria-modal="true" aria-labelledby="octa-modal-title" hidden>
        <div class="octa-modal-backdrop" data-modal-close></div>
        <div class="octa-modal-panel">
            <button class="octa-modal-close" data-modal-close aria-label="Tutup modal">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
            <div class="octa-modal-content">
                <h3 id="octa-modal-title"></h3>
                <div class="octa-modal-image-wrap">
                    <img id="octa-modal-image" src="" alt="" loading="lazy">
                </div>
                <p id="octa-modal-caption"></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (() => {
            const modal = document.getElementById('octa-modal');
            const backdrop = document.querySelector('.octa-modal-backdrop');
            const closeBtn = document.querySelector('.octa-modal-close');
            const modalTitle = document.getElementById('octa-modal-title');
            const modalImage = document.getElementById('octa-modal-image');
            const modalCaption = document.getElementById('octa-modal-caption');
            const openers = document.querySelectorAll('[data-modal]');

            const openModal = (id) => {
                const el = document.getElementById(id);
                if (!el || !modal) return;
                const img = el.querySelector('img');
                const title = el.querySelector('h3')?.textContent ?? el.querySelector('.octa-license-badge')?.textContent ?? '';
                const caption = el.querySelector('p')?.textContent ?? '';
                if (img) {
                    modalImage.src = img.src;
                    modalImage.alt = img.alt;
                }
                modalTitle.textContent = title;
                modalCaption.textContent = caption;
                modal.hidden = false;
                document.body.style.overflow = 'hidden';
            };

            const closeModal = () => {
                if (!modal) return;
                modal.hidden = true;
                modalImage.src = '';
                document.body.style.overflow = '';
            };

            openers.forEach((opener) => {
                opener.addEventListener('click', (event) => {
                    event.preventDefault();
                    openModal(opener.getAttribute('data-modal'));
                });
            });

            closeBtn?.addEventListener('click', closeModal);
            backdrop?.addEventListener('click', closeModal);

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modal && !modal.hidden) {
                    closeModal();
                }
            });
        })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views/beranda.blade.php ENDPATH**/ ?>