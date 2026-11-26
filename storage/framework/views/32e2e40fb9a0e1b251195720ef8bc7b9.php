<?php
    $faqCategories = array_keys(config('faqs'));
    $faqCount = array_sum(array_map('count', config('faqs')));
?>



<?php $__env->startSection('meta_title', 'FAQ | Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', 'Temukan jawaban tentang booking, treatment, pembayaran, promo, dan perawatan setelah treatment di Octa Beauty Care.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="faq-page">
        <section class="faq-page-hero" aria-labelledby="faq-page-title">
            <span class="faq-page-flower faq-page-flower-left" aria-hidden="true">✿</span>
            <span class="faq-page-flower faq-page-flower-right" aria-hidden="true">✿</span>
            <div class="container faq-page-hero-inner">
                <span class="eyebrow"><span class="eyebrow-dot"></span> Bantuan &amp; Support</span>
                <h1 id="faq-page-title">Pertanyaan yang Sering<br>Ditanyakan</h1>
                <p>Temukan jawaban atas pertanyaan umum mengenai treatment, booking, pembayaran, dan layanan kami untuk pengalaman kecantikan yang lebih mudah.</p>
            </div>
        </section>

        <section class="faq-page-content" aria-label="Pertanyaan umum">
            <div class="container faq-page-inner">
                <div class="faq-category-tabs" role="group" aria-label="Filter kategori FAQ">
                    <button type="button" class="is-active" data-faq-category="all" aria-pressed="true">Semua</button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faqCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-faq-category="<?php echo e(\Illuminate\Support\Str::slug($category)); ?>" aria-pressed="false"><?php echo e($category); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="faq-page-list" id="faq-page-list">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = config('faqs'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <details class="faq-page-item" data-faq-category="<?php echo e(\Illuminate\Support\Str::slug($category)); ?>" <?php if($loop->parent->first && $loop->first): ?> open <?php endif; ?>>
                                <summary><?php echo e($question['question']); ?><span aria-hidden="true">+</span></summary>
                                <p><?php echo e($question['answer']); ?></p>
                            </details>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <p class="faq-page-empty" id="faq-page-empty" hidden>Tidak ada pertanyaan pada kategori ini.</p>
                <p class="faq-page-count"><?php echo e($faqCount); ?> pertanyaan untuk membantu kunjunganmu.</p>
            </div>
        </section>

        <section class="faq-page-support" aria-labelledby="faq-support-title">
            <div class="container">
                <div class="faq-support-card">
                    <span class="faq-support-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><path d="M4 13v-2a8 8 0 0 1 16 0v2"/><path d="M4 13h3v6H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 1-2Zm16 0h-3v6h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-1-2ZM17 19c-.8 1.3-2.5 2-5 2"/></svg>
                    </span>
                    <span class="eyebrow">Kami siap membantu</span>
                    <h2 id="faq-support-title">Masih punya pertanyaan?</h2>
                    <p>Tim kami siap membantu menjawab pertanyaanmu. Hubungi kami untuk mendapatkan informasi lebih lanjut.</p>
                    <div class="faq-support-actions">
                        <a class="button button-pink" href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Z"/><path d="M8.7 8.2c.3 0 .5.2.7.4l.6 1.2c.1.2.1.4 0 .6l-.4.5c.5 1 1.2 1.8 2.2 2.3l.5-.4c.2-.1.4-.1.6 0l1.2.6c.2.1.4.4.4.7v1c0 .5-.4.9-.9.9-4 .2-7.7-3.4-7.9-7.4 0-.5.4-.9.9-.9h1Z"/></svg>
                            Hubungi Kami
                        </a>
                        <a class="button faq-support-email" href="mailto:hello@octabeautycare.com">Email Support</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (() => {
            const categoryButtons = Array.from(document.querySelectorAll('[data-faq-category]')).filter((element) => element.matches('button'));
            const questions = Array.from(document.querySelectorAll('.faq-page-item'));
            const emptyMessage = document.getElementById('faq-page-empty');

            categoryButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const selectedCategory = button.dataset.faqCategory;
                    let visibleCount = 0;

                    categoryButtons.forEach((item) => {
                        const active = item === button;
                        item.classList.toggle('is-active', active);
                        item.setAttribute('aria-pressed', active ? 'true' : 'false');
                    });

                    questions.forEach((question) => {
                        const visible = selectedCategory === 'all' || question.dataset.faqCategory === selectedCategory;
                        question.hidden = !visible;
                        if (!visible) {
                            question.open = false;
                        } else {
                            visibleCount += 1;
                        }
                    });

                    emptyMessage.hidden = visibleCount > 0;
                });
            });
        })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\faq.blade.php ENDPATH**/ ?>