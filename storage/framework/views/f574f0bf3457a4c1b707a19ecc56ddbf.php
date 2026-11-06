<?php
    $endedPromotions = [
        ['title' => 'Flash Sale 10.10', 'description' => 'Diskon spesial untuk treatment favoritmu.', 'date' => '10 Okt 2026'],
        ['title' => 'Anniversary Gift', 'description' => 'Hadiah perawatan untuk member setia Octa.', 'date' => '05 Okt 2026'],
        ['title' => 'Oxygenet Promo', 'description' => 'Kulit segar dengan penawaran istimewa.', 'date' => '30 Sep 2026'],
        ['title' => 'Weekend Card Discount', 'description' => 'Promo pembayaran dengan kartu pilihan.', 'date' => '27 Sep 2026'],
    ];

    $upcomingPromotions = [
        [
            'title' => 'Year-End Grand Sale',
            'description' => 'Akhiri tahun dengan kulit sehat dan penawaran istimewa dari Octa.',
            'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=700&q=80',
            'alt' => 'Suasana ruang perawatan yang menenangkan',
            'date' => 'Segera hadir',
        ],
        [
            'title' => 'New Treatment Launch',
            'description' => 'Perawatan terbaru kami segera hadir untuk rutinitas kulitmu.',
            'image' => 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=700&q=80',
            'alt' => 'Ruang treatment modern dengan fasilitas lengkap',
            'date' => 'Segera hadir',
        ],
    ];
?>



<?php $__env->startSection('meta_title', 'Promo & Penawaran Spesial | Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', 'Temukan promo perawatan wajah terbaru dari Octa Beauty Care. Klaim penawaran spesial untuk facial, brightening, dan treatment favoritmu.'); ?>
<?php $__env->startSection('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85'); ?>

<?php $__env->startSection('content'); ?>
    <div class="promo-page">
        <section class="promo-hero" aria-labelledby="promo-title">
            <span class="promo-hero-flower promo-hero-flower-left" aria-hidden="true">&#10047;</span>
            <span class="promo-hero-flower promo-hero-flower-right" aria-hidden="true">&#10047;</span>
            <div class="container promo-hero-inner">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Penawaran Khusus Octa Beauty Care</span>
                <h1 id="promo-title">Promo &amp; Penawaran Spesial</h1>
                <p>Temukan berbagai promo perawatan kecantikan dengan harga terbaik. Saatnya manjakan kulitmu dengan penawaran istimewa dari Octa.</p>
            </div>
        </section>

        <section class="promo-section promo-active-section" id="promo-berjalan" aria-labelledby="promo-active-title">
            <div class="container">
                <div class="promo-section-heading">
                    <div>
                        <span class="promo-section-kicker"><span aria-hidden="true">✦</span> Penawaran untukmu</span>
                        <h2 id="promo-active-title">Promo Berjalan</h2>
                    </div>
                    <span class="promo-count">03 promo aktif</span>
                </div>

                <div class="promo-active-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $activePromotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="promo-offer-card promo-offer-<?php echo e($promotion['style']); ?>">
                            <div class="promo-offer-image">
                                <img src="<?php echo e($promotion['image']); ?>" alt="<?php echo e($promotion['alt']); ?>" loading="lazy">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($promotion['style'] !== 'compact'): ?>
                                    <span class="promo-offer-discount"><?php echo e($promotion['discount']); ?><small>OFF</small></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="promo-offer-content">
                                <span class="promo-offer-eyebrow"><?php echo e($promotion['eyebrow']); ?></span>
                                <h3><?php echo e($promotion['title']); ?></h3>
                                <p><?php echo e($promotion['description']); ?></p>
                                <ul class="promo-offer-details">
                                    <li><span aria-hidden="true">✓</span><?php echo e($promotion['validity']); ?></li>
                                    <li><span aria-hidden="true">✓</span><?php echo e($promotion['minimum']); ?></li>
                                </ul>
                                <div class="promo-offer-footer">
                                    <span>Kode <strong><?php echo e($promotion['code']); ?></strong></span>
                                    <a class="promo-offer-cta" href="<?php echo e(route('promo.show', $promotion['slug'])); ?>">Lihat Promo <span aria-hidden="true">→</span></a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="promo-claim-section" aria-labelledby="promo-claim-title">
            <div class="container">
                <div class="promo-claim-card">
                    <div class="promo-claim-heading">
                        <span class="eyebrow"><span class="eyebrow-dot"></span> Mudah dan praktis</span>
                        <h2 id="promo-claim-title">Cara Klaim Promo</h2>
                    </div>
                    <ol class="promo-claim-steps">
                        <li><span>01</span><div><strong>Pilih Treatment</strong><p>Tentukan treatment dan promo yang paling sesuai untukmu.</p></div></li>
                        <li><span>02</span><div><strong>Reservasi Jadwal</strong><p>Hubungi kami untuk memilih jadwal perawatan yang tersedia.</p></div></li>
                        <li><span>03</span><div><strong>Tunjukkan Promo</strong><p>Sebutkan kode promo saat melakukan reservasi atau datang ke klinik.</p></div></li>
                        <li><span>04</span><div><strong>Nikmati Diskon</strong><p>Promo langsung digunakan saat kamu melakukan pembayaran.</p></div></li>
                    </ol>
                    <a class="promo-claim-cta" href="<?php echo e(route('booking.create')); ?>">Klaim Promo Sekarang <span aria-hidden="true">→</span></a>
                    <p class="promo-claim-note">Syarat dan ketentuan berlaku untuk setiap promo.</p>
                </div>
            </div>
        </section>

        <section class="promo-section promo-ended-section" aria-labelledby="promo-ended-title">
            <div class="container">
                <div class="promo-section-heading">
                    <div>
                        <span class="promo-section-kicker"><span aria-hidden="true">✦</span> Terima kasih sudah ikut merayakan</span>
                        <h2 id="promo-ended-title">Baru Saja Berakhir <span>(<?php echo e(count($endedPromotions)); ?> promo)</span></h2>
                    </div>
                </div>
                <div class="promo-ended-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $endedPromotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="promo-ended-card">
                            <span class="promo-ended-icon" aria-hidden="true">✦</span>
                            <h3><?php echo e($promotion['title']); ?></h3>
                            <p><?php echo e($promotion['description']); ?></p>
                            <div><span>Berakhir <?php echo e($promotion['date']); ?></span><span class="promo-ended-label">Berakhir</span></div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <p class="promo-ended-note">Jangan khawatir, promo menarik lainnya akan segera hadir. Tetap ikuti kabar terbaru dari Octa Beauty Care.</p>
            </div>
        </section>

        <section class="promo-section promo-upcoming-section" aria-labelledby="promo-upcoming-title">
            <div class="container">
                <div class="promo-section-heading">
                    <div>
                        <span class="promo-section-kicker"><span aria-hidden="true">✦</span> Nantikan penawaran berikutnya</span>
                        <h2 id="promo-upcoming-title">Segera Hadir <span class="promo-coming-soon">COMING SOON</span></h2>
                    </div>
                </div>
                <div class="promo-upcoming-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $upcomingPromotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="promo-upcoming-card">
                            <div class="promo-upcoming-image">
                                <img src="<?php echo e($promotion['image']); ?>" alt="<?php echo e($promotion['alt']); ?>" loading="lazy">
                                <span>Coming soon</span>
                            </div>
                            <div class="promo-upcoming-content">
                                <span class="promo-offer-eyebrow"><?php echo e($promotion['date']); ?></span>
                                <h3><?php echo e($promotion['title']); ?></h3>
                                <p><?php echo e($promotion['description']); ?></p>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\promo.blade.php ENDPATH**/ ?>