<?php $__env->startSection('meta_title', $product->name . ' | Produk Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', $product->description); ?>
<?php $__env->startSection('meta_image', $product->image); ?>

<?php $__env->startSection('content'); ?>
    <div class="treatment-detail-page">
        <section class="treatment-detail-hero" aria-labelledby="product-detail-title">
            <div class="container">
                <nav class="treatment-detail-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo e(route('home')); ?>">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="<?php echo e(route('treatment')); ?>">Layanan</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page"><?php echo e($product->name); ?></span>
                </nav>
                <div class="treatment-detail-hero-grid">
                    <div class="treatment-detail-intro">
                        <span class="treatment-detail-category"><span aria-hidden="true">✦</span> <?php echo e(strtoupper($product->category ?? 'Produk')); ?></span>
                        <h1 id="product-detail-title"><?php echo e($product->name); ?></h1>
                        <p><?php echo e($product->description); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->price): ?>
                            <div class="treatment-detail-meta">
                                <span class="treatment-detail-price"><?php echo e($product->price); ?></span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a class="button button-pink treatment-detail-booking" href="<?php echo e(route('booking.create')); ?>">Booking Sekarang <span aria-hidden="true">→</span></a>
                    </div>
                    <figure class="treatment-detail-visual">
                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" fetchpriority="high">
                        <figcaption><span aria-hidden="true">✦</span> Produk perawatan Octa Beauty Care</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="treatment-detail-about" aria-labelledby="product-about-title">
            <div class="container treatment-detail-about-grid">
                <div class="treatment-detail-about-copy">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang Produk Ini</span>
                    <h2 id="product-about-title">Kenali <em><?php echo e($product->name); ?></em></h2>
                    <p><?php echo e($product->description); ?></p>
                </div>
            </div>
        </section>

        <section class="treatment-detail-cta" aria-labelledby="product-cta-title">
            <div class="container">
                <div class="treatment-detail-cta-card">
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-left" aria-hidden="true">✦</span>
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-right" aria-hidden="true">✧</span>
                    <span class="eyebrow">Saatnya merawat diri</span>
                    <h2 id="product-cta-title">Siap Untuk Kulit Glowing?</h2>
                    <p>Jadwalkan kunjungan dan konsultasikan kebutuhan kulitmu bersama tim Octa Beauty Care.</p>
                    <a class="button button-pink" href="<?php echo e(route('booking.create')); ?>">Booking Sekarang <span aria-hidden="true">→</span></a>
                    <a class="treatment-detail-cta-whatsapp" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Chat via WhatsApp</a>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\product-detail.blade.php ENDPATH**/ ?>