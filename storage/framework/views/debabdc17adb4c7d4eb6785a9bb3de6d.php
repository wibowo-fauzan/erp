

<?php $__env->startSection('meta_title', $promotion['detail_title'] . ' | Promo Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', $promotion['detail_description']); ?>
<?php $__env->startSection('meta_image', $promotion['image']); ?>

<?php $__env->startSection('content'); ?>
    <div class="promo-detail-page">
        <section class="promo-detail-hero" aria-labelledby="promo-detail-title">
            <span class="promo-detail-flower promo-detail-flower-one" aria-hidden="true">✿</span>
            <span class="promo-detail-flower promo-detail-flower-two" aria-hidden="true">✿</span>
            <div class="container promo-detail-hero-grid">
                <div class="promo-detail-copy">
                    <nav class="promo-detail-breadcrumb" aria-label="Breadcrumb">
                        <a href="<?php echo e(route('home')); ?>">Beranda</a>
                        <span aria-hidden="true">/</span>
                        <a href="<?php echo e(route('promo')); ?>">Promo</a>
                        <span aria-hidden="true">/</span>
                        <span aria-current="page"><?php echo e($promotion['title']); ?></span>
                    </nav>
                    <span class="promo-detail-eyebrow"><span aria-hidden="true">✦</span> <?php echo e($promotion['eyebrow']); ?></span>
                    <h1 id="promo-detail-title"><?php echo e($promotion['detail_title']); ?></h1>
                    <div class="promo-detail-offer-meta">
                        <span class="promo-detail-discount"><?php echo e($promotion['discount']); ?></span>
                        <span><small>Periode Promo</small><strong><?php echo e($promotion['date']); ?></strong></span>
                    </div>
                    <p class="promo-detail-description"><?php echo e($promotion['detail_description']); ?></p>
                    <a class="button button-pink promo-detail-booking" href="<?php echo e(route('booking.create', ['treatment' => $promotion['treatment_slug'], 'promo' => $promotion['slug']])); ?>">Booking Promo <span aria-hidden="true">→</span></a>
                </div>
                <figure class="promo-detail-visual">
                    <img src="<?php echo e($promotion['image']); ?>" alt="<?php echo e($promotion['alt']); ?>" fetchpriority="high">
                    <figcaption><span aria-hidden="true">✦</span> Penawaran spesial Octa Beauty Care</figcaption>
                </figure>
            </div>
        </section>

        <section class="promo-detail-benefits" aria-labelledby="promo-benefits-title">
            <div class="container">
                <header class="promo-detail-section-heading">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Lebih banyak alasan untuk merawat diri</span>
                    <h2 id="promo-benefits-title">Keunggulan Promo</h2>
                </header>
                <div class="promo-benefits-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $promotion['benefits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="promo-benefit-card">
                            <span class="promo-benefit-icon" aria-hidden="true">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loop->first): ?>
                                    <svg viewBox="0 0 24 24"><path d="m12 3 2.7 5.5 6 .9-4.4 4.3 1 6-5.3-2.8-5.3 2.8 1-6-4.4-4.3 6-.9L12 3Z"/></svg>
                                <?php elseif($loop->last): ?>
                                    <svg viewBox="0 0 24 24"><path d="M4 19.5h16M6 16l3.2-4 3 2.5 5.8-7"/><path d="M14 7.5h4v4"/></svg>
                                <?php elseif($loop->iteration === 2): ?>
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.3"/><path d="M5 20c.4-3.4 3-5.5 7-5.5s6.6 2.1 7 5.5"/><path d="m9.7 11 1.5 1.5 3.1-3.1"/></svg>
                                <?php else: ?>
                                    <svg viewBox="0 0 24 24"><path d="m12 3 7 3v5.5c0 4.4-3 7.3-7 8.5-4-1.2-7-4.1-7-8.5V6l7-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <h3><?php echo e($benefit['title']); ?></h3>
                            <p><?php echo e($benefit['description']); ?></p>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="promo-detail-terms" aria-labelledby="promo-terms-title">
            <div class="container">
                <div class="promo-terms-wrap">
                    <header class="promo-detail-section-heading promo-terms-heading">
                        <span class="eyebrow"><span class="eyebrow-dot"></span> Informasi promo</span>
                        <h2 id="promo-terms-title">Syarat &amp; Ketentuan</h2>
                    </header>
                    <ul class="promo-terms-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $promotion['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><span aria-hidden="true">✓</span><?php echo e($term); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                    <div class="promo-terms-code"><span>Kode promo</span><strong><?php echo e($promotion['code']); ?></strong></div>
                </div>
            </div>
        </section>

        <section class="promo-detail-related" aria-labelledby="promo-related-title">
            <div class="container">
                <div class="promo-detail-related-heading">
                    <div>
                        <h2 id="promo-related-title">Promo Menarik Lainnya</h2>
                        <p>Jangan lewatkan penawaran spesial lainnya dari Octa.</p>
                    </div>
                    <a href="<?php echo e(route('promo')); ?>">Lihat Semua Promo <span aria-hidden="true">→</span></a>
                </div>
                <div class="promo-related-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedPromotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="promo-related-card">
                            <a class="promo-related-image" href="<?php echo e(route('promo.show', $related['slug'])); ?>">
                                <img src="<?php echo e($related['image']); ?>" alt="<?php echo e($related['alt']); ?>" loading="lazy">
                                <span><?php echo e($related['discount']); ?> OFF</span>
                            </a>
                            <div class="promo-related-body">
                                <span class="promo-offer-eyebrow"><?php echo e($related['eyebrow']); ?></span>
                                <h3><a href="<?php echo e(route('promo.show', $related['slug'])); ?>"><?php echo e($related['title']); ?></a></h3>
                                <p><?php echo e($related['description']); ?></p>
                                <div><strong><?php echo e($related['code']); ?></strong><a href="<?php echo e(route('promo.show', $related['slug'])); ?>" aria-label="Lihat promo <?php echo e($related['title']); ?>">→</a></div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\promo-detail.blade.php ENDPATH**/ ?>