

<?php $__env->startSection('meta_title', $treatment['title'] . ' | Treatment Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', $treatment['description']); ?>
<?php $__env->startSection('meta_image', $treatment['image']); ?>

<?php $__env->startSection('content'); ?>
    <div class="treatment-detail-page">
        <section class="treatment-detail-hero" aria-labelledby="treatment-detail-title">
            <div class="container">
                <nav class="treatment-detail-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo e(route('home')); ?>">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="<?php echo e(route('treatment')); ?>">Facial Treatment</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page"><?php echo e($treatment['title']); ?></span>
                </nav>
                <div class="treatment-detail-hero-grid">
                    <div class="treatment-detail-intro">
                        <span class="treatment-detail-category"><span aria-hidden="true">✦</span> <?php echo e(strtoupper($treatment['category'])); ?> TREATMENT</span>
                        <h1 id="treatment-detail-title"><?php echo e($treatment['title']); ?></h1>
                        <p><?php echo e($treatment['description']); ?></p>
                        <div class="treatment-detail-meta">
                            <span>
                                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                                <?php echo e($treatment['duration']); ?>

                            </span>
                            <span class="treatment-detail-price"><?php echo e($treatment['price']); ?></span>
                        </div>
                        <a class="button button-pink treatment-detail-booking" href="<?php echo e(route('booking.create', ['treatment' => $treatment['slug']])); ?>">Booking Treatment <span aria-hidden="true">→</span></a>
                    </div>
                    <figure class="treatment-detail-visual">
                        <img src="<?php echo e($treatment['image']); ?>" alt="<?php echo e($treatment['alt']); ?>" fetchpriority="high">
                        <figcaption><span aria-hidden="true">✦</span> Perawatan profesional Octa Beauty Care</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="treatment-detail-about" aria-labelledby="treatment-about-title">
            <div class="container treatment-detail-about-grid">
                <div class="treatment-detail-about-copy">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang Treatment Ini</span>
                    <h2 id="treatment-about-title">Kenali <em><?php echo e($treatment['title']); ?></em></h2>
                    <p><?php echo e($details['overview']); ?></p>
                    <div class="treatment-detail-highlights">
                        <article>
                            <span aria-hidden="true">✦</span>
                            <div><h3>Instan Glow</h3><p>Kulit terasa lebih segar setelah rangkaian perawatan.</p></div>
                        </article>
                        <article>
                            <span aria-hidden="true">◈</span>
                            <div><h3>Profesional</h3><p>Didampingi terapis yang memperhatikan kebutuhan kulitmu.</p></div>
                        </article>
                    </div>
                </div>
                <aside class="treatment-detail-benefits">
                    <h3>Manfaat Treatment</h3>
                    <ul>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['benefits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><span aria-hidden="true">✓</span><?php echo e($benefit); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </aside>
            </div>
        </section>

        <section class="treatment-detail-process" aria-labelledby="treatment-process-title">
            <div class="container">
                <header class="treatment-detail-section-heading">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> The Experience</span>
                    <h2 id="treatment-process-title">Proses Treatment Kami</h2>
                </header>
                <ol class="treatment-process-steps">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['process']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span class="treatment-process-number"><?php echo e(sprintf('%02d', $loop->iteration)); ?></span>
                            <h3><?php echo e($step['title']); ?></h3>
                            <p><?php echo e($step['description']); ?></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ol>
            </div>
        </section>

        <section class="treatment-detail-guidance" aria-label="Kecocokan dan informasi treatment">
            <div class="container treatment-detail-guidance-grid">
                <div>
                    <h2>Cocok Untuk Kondisi:</h2>
                    <ul class="treatment-condition-grid">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['conditions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><span aria-hidden="true">✦</span><?php echo e($condition); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
                <div class="treatment-precautions">
                    <h2>Yang Perlu Diketahui</h2>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['precautions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precaution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article>
                            <span class="treatment-precaution-icon" aria-hidden="true">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loop->first): ?>
                                    <svg viewBox="0 0 24 24"><path d="M12 3 4 7v5c0 5 3.5 8 8 9 4.5-1 8-4 8-9V7l-8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
                                <?php elseif($loop->last): ?>
                                    <svg viewBox="0 0 24 24"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="9"/></svg>
                                <?php else: ?>
                                    <svg viewBox="0 0 24 24"><path d="M12 8v5m0 3h.01"/><path d="M10 3h4l8 15-2 3H4l-2-3 8-15Z"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <div><h3><?php echo e($precaution['title']); ?></h3><p><?php echo e($precaution['description']); ?></p></div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="treatment-detail-faq" aria-labelledby="treatment-faq-title">
            <div class="container treatment-detail-faq-inner">
                <header class="treatment-detail-section-heading">
                    <h2 id="treatment-faq-title">Pertanyaan Umum</h2>
                    <p>Informasi yang mungkin ingin kamu ketahui tentang <?php echo e($treatment['title']); ?>.</p>
                </header>
                <div class="treatment-detail-faq-list">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details['faqs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <details class="treatment-detail-faq-item" <?php if($loop->first): ?> open <?php endif; ?>>
                            <summary><?php echo e($faq['question']); ?><span aria-hidden="true">+</span></summary>
                            <p><?php echo e($faq['answer']); ?></p>
                        </details>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="treatment-detail-related" aria-labelledby="treatment-related-title">
            <div class="container">
                <div class="treatment-detail-related-heading">
                    <div>
                        <h2 id="treatment-related-title">Treatment Terkait</h2>
                        <p>Jelajahi perawatan lain yang mungkin sesuai dengan kebutuhanmu.</p>
                    </div>
                    <a href="<?php echo e(route('treatment')); ?>">Lihat semua layanan <span aria-hidden="true">→</span></a>
                </div>
                <div class="treatment-detail-related-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedTreatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="treatment-related-card">
                            <a class="treatment-related-image" href="<?php echo e(route('treatment.show', $related['slug'])); ?>">
                                <img src="<?php echo e($related['image']); ?>" alt="<?php echo e($related['alt']); ?>" loading="lazy">
                                <span><?php echo e($related['category']); ?></span>
                            </a>
                            <div class="treatment-related-body">
                                <h3><a href="<?php echo e(route('treatment.show', $related['slug'])); ?>"><?php echo e($related['title']); ?></a></h3>
                                <p><?php echo e($related['description']); ?></p>
                                <div><strong><?php echo e($related['price']); ?></strong><a href="<?php echo e(route('treatment.show', $related['slug'])); ?>" aria-label="Lihat detail <?php echo e($related['title']); ?>">→</a></div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="treatment-detail-cta" aria-labelledby="treatment-cta-title">
            <div class="container">
                <div class="treatment-detail-cta-card">
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-left" aria-hidden="true">✦</span>
                    <span class="treatment-detail-cta-spark treatment-detail-cta-spark-right" aria-hidden="true">✧</span>
                    <span class="eyebrow">Saatnya merawat diri</span>
                    <h2 id="treatment-cta-title">Siap Untuk Kulit Glowing?</h2>
                    <p>Jadwalkan kunjungan dan konsultasikan kebutuhan kulitmu bersama tim Octa Beauty Care.</p>
                    <a class="button button-pink" href="<?php echo e(route('booking.create', ['treatment' => $treatment['slug']])); ?>">Booking Sekarang <span aria-hidden="true">→</span></a>
                    <a class="treatment-detail-cta-whatsapp" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Chat via WhatsApp</a>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views/treatment-detail.blade.php ENDPATH**/ ?>