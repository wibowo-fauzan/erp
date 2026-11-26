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
                                <?php echo e($treatment['duration']); ?> menit
                            </span>
                            <span class="treatment-detail-price"><?php echo e(rupiah($treatment['price'])); ?></span>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($treatment['social_media'])): ?>
                            <div class="treatment-detail-social" aria-label="Media sosial <?php echo e($treatment['title']); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $treatment['social_media']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($url); ?>" class="treatment-detail-social-icon" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e(ucfirst($type)); ?>">
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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($treatment['show_booking_button'] ?? true): ?>
                            <a class="button button-pink treatment-detail-booking" href="<?php echo e(route('booking.create', ['treatment' => $treatment['slug']])); ?>">Booking Treatment <span aria-hidden="true">→</span></a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

        <section class="treatment-detail-products" aria-labelledby="treatment-products-title">
            <div class="container">
                <header class="treatment-detail-section-heading">
                    <h2 id="treatment-products-title">Produk yang Digunakan</h2>
                    <p>Produk perawatan yang kami gunakan dalam treatment ini.</p>
                </header>
                <div class="treatment-detail-products-grid">
                    <?php
                        $productIds = $treatment['product_ids'] ?? [];
                        $treatmentProducts = collect($productIds)->map(fn ($id) => \App\Models\Product::query()->where('id', $id)->where('is_active', true)->first())->filter();
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($treatmentProducts->isNotEmpty()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $treatmentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="treatment-product-card">
                                <a href="<?php echo e(route('product.show', $product->slug)); ?>">
                                    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" loading="lazy">
                                </a>
                                <div class="treatment-product-body">
                                    <h3><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></h3>
                                    <p class="treatment-product-short"><?php echo e(\Illuminate\Support\Str::limit($product->description ?? '', 80)); ?></p>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->price): ?>
                                        <span class="treatment-product-price"><?php echo e(rupiah($product->price)); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        <p class="treatment-detail-empty">Belum ada produk yang ditetapkan untuk treatment ini.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
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

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\treatment-detail.blade.php ENDPATH**/ ?>