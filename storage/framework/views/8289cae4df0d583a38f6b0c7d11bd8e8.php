<?php $__env->startSection('meta_title', 'Layanan Perawatan | Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', 'Tempat di mana perawatan profesional bertemu dengan kenyamanan. Pilih treatment facial, brightening, anti aging, dan konsultasi analisis kulit di Octa Beauty Care.'); ?>
<?php $__env->startSection('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $filters = [
            'semua' => 'Semua',
            'facial' => 'Facial',
            'acne' => 'Acne',
            'brightening' => 'Brightening',
            'anti-aging' => 'Anti Aging',
            'body' => 'Body Treatment',
        ];
    ?>

    <section class="treatment-page">
        <div class="treatment-hero">
            <div class="container treatment-hero-inner">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Our Signature Treatments</span>
                <h1>Layanan Perawatan</h1>
                <p>Tempat di mana perawatan profesional bertemu dengan kenyamanan. Pilih treatment yang paling sesuai untuk kesehatan dan kecantikan kulit Anda.</p>
            </div>
            <span class="treatment-hero-flower treatment-hero-flower-left" aria-hidden="true">&#10047;</span>
            <span class="treatment-hero-flower treatment-hero-flower-right" aria-hidden="true">&#10047;</span>
        </div>

        <div class="layanan-filters" role="group" aria-label="Filter kategori treatment">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="treatment-filter <?php if($loop->first): ?> is-active <?php endif; ?>" type="button" data-filter="<?php echo e($value); ?>"><?php echo e($label); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="container layanan-catalog">
            <h2 class="sr-only">Daftar Treatment</h2>
            <div class="layanan-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="layanan-card" data-filter="<?php echo e($service['filter']); ?>" data-slug="<?php echo e($service['slug']); ?>">
                        <div class="layanan-media">
                            <img src="<?php echo e($service['image']); ?>" alt="<?php echo e($service['alt']); ?>" loading="lazy">
                            <span class="layanan-badge"><?php echo e($service['category']); ?></span>
                        <button class="layanan-favorite" type="button" data-wishlist-toggle="<?php echo e($service['slug']); ?>" data-wishlist-url="<?php echo e(route('wishlist.toggle')); ?>" data-wishlist-csrf="<?php echo e(csrf_token()); ?>" aria-label="Tambahkan <?php echo e($service['title']); ?> ke wishlist" aria-pressed="false">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20.3s-7.5-4.6-7.5-9.6a4.2 4.2 0 0 1 7.5-2.6 4.2 4.2 0 0 1 7.5 2.6c0 5-7.5 9.6-7.5 9.6Z"/></svg>
                        </button>
                        </div>
                        <div class="layanan-body">
                            <h3><?php echo e($service['title']); ?></h3>
                            <p><?php echo e($service['description']); ?></p>
                            <div class="layanan-meta">
                                <span class="layanan-duration">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l4 2"/></svg>
                                    <?php echo e($service['duration']); ?> menit
                                </span>
                                <span class="layanan-price"><?php echo e(rupiah($service['price'])); ?></span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($service['social_media'])): ?>
                                <div class="layanan-social" aria-label="Media sosial <?php echo e($service['title']); ?>">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $service['social_media']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($url); ?>" class="layanan-social-icon" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e(ucfirst($type)); ?>">
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
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service['show_detail_button'] ?? true): ?>
                                <a class="layanan-action <?php if($service['primary']): ?> is-primary <?php endif; ?>" href="<?php echo e(route('treatment.show', $service['slug'])); ?>">Lihat Detail <span aria-hidden="true">→</span></a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <p class="treatment-empty" id="layanan-empty" hidden>Belum ada treatment untuk kategori ini.</p>
        </div>

        <div class="treatment-consult">
            <div class="container">
                <div class="treatment-consult-card">
                    <div class="treatment-consult-copy">
                        <span class="eyebrow">Need Help?</span>
                        <h2>Belum Tahu Treatment yang Cocok?</h2>
                        <p>Setiap jenis kulit memiliki kebutuhan yang unik. Tim ahli kami siap membantu Anda melakukan analisis kulit menyeluruh untuk menentukan perawatan terbaik yang memberikan hasil maksimal tanpa efek sampling.</p>
                        <div class="treatment-consult-actions">
                            <a class="button button-pink" href="<?php echo e(route('booking.create', ['treatment' => 'expert-skin-analysis'])); ?>">Konsultasi Sekarang <span aria-hidden="true">&rarr;</span></a>
                            <a class="treatment-consult-wa" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">Hubungi Lewat WhatsApp</a>
                        </div>
                    </div>
                    <div class="treatment-consult-art">
                        <div class="treatment-consult-image">
                            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=900&q=85" alt="Ruang treatment modern Octa Beauty Care" loading="lazy">
                        </div>
                        <span class="treatment-consult-spark" aria-hidden="true">&#10022;</span>
                        <span class="treatment-consult-label">Octa Beauty Care</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (() => {
            const wishlistToggleButtons = Array.from(document.querySelectorAll('[data-wishlist-toggle]'));

            async function toggleWishlist(slug, button) {
                const url = button.dataset.wishlistUrl;
                const csrfToken = button.dataset.wishlistCsrf;
                const isActive = button.classList.contains('is-active');

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({ slug }),
                    });

                    const data = await response.json();

                    if (response.ok) {
                        button.classList.toggle('is-active', data.added === true);
                        button.setAttribute('aria-pressed', data.added === true ? 'true' : 'false');
                        button.setAttribute('aria-label', data.added === true
                            ? 'Hapus dari wishlist'
                            : 'Tambahkan ke wishlist');
                    }
                } catch (error) {
                    console.error('Gagal mengubah wishlist:', error);
                }
            }

            wishlistToggleButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    toggleWishlist(button.dataset.wishlistToggle, button);
                });
            });

            const filterButtons = () => Array.from(document.querySelectorAll('.treatment-filter'));
            const cards = () => Array.from(document.querySelectorAll('.layanan-card[data-filter]'));

            const applyFilter = (filter) => {
                const visible = cards().filter((card) => filter === 'semua' || card.dataset.filter === filter);
                const empty = document.getElementById('layanan-empty');

                cards().forEach((card) => {
                    card.hidden = !visible.includes(card);
                });

                if (empty) {
                    empty.hidden = visible.length > 0;
                }
            };

            document.addEventListener('DOMContentLoaded', () => {
                filterButtons().forEach((button) => {
                    button.addEventListener('click', () => {
                        filterButtons().forEach((item) => item.classList.remove('is-active'));
                        button.classList.add('is-active');
                        applyFilter(button.dataset.filter);
                    });
                });
            });
        })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\treatment.blade.php ENDPATH**/ ?>