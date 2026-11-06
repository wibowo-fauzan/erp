

<?php $__env->startSection('meta_title', 'Booking Berhasil | Octa Beauty Care'); ?>
<?php $__env->startSection('meta_description', 'Permintaan booking treatment kamu sudah tersimpan. Simpan kode booking dan tunggu konfirmasi dari tim Octa Beauty Care.'); ?>
<?php $__env->startSection('meta_robots', 'noindex,follow'); ?>

<?php $__env->startSection('content'); ?>
    <section class="booking-confirmation-page">
        <div class="container">
            <div class="booking-confirmation-card">
                <span class="booking-confirmation-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7"/></svg>
                </span>
                <span class="eyebrow"><span class="eyebrow-dot"></span> Reservasi berhasil disimpan</span>
                <h1>Booking Berhasil!</h1>
                <p>Permintaan booking treatment kamu sudah kami terima. Silakan selesaikan pembayaran untuk mengonfirmasi reservasi.</p>
                <div class="booking-confirmation-reference">
                    <span>Kode Booking</span>
                    <strong><?php echo e($booking->reference); ?></strong>
                    <div>
                        <span>Treatment<strong><?php echo e($treatment['title']); ?></strong></span>
                        <span>Tanggal<strong><?php echo e($booking->booking_date->translatedFormat('j M Y')); ?></strong></span>
                        <span>Jam<strong><?php echo e($booking->booking_time); ?> WIB</strong></span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->promotion_code): ?>
                        <span class="booking-confirmation-promo">Promo <strong><?php echo e($booking->promotion_code); ?></strong></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($snapToken): ?>
                    <div class="midtrans-payment-section" style="margin:24px 0; padding:20px; background:#f8fafc; border-radius:12px; border:1px solid #e2e8f0;">
                        <h3 style="margin:0 0 16px 0; font-size:18px; color:#0f172a;">💳 Bayar Sekarang via Midtrans</h3>
                        <button id="midtrans-snap-button" style="width:100%; padding:14px; background:#2ecc71; color:#fff; border:none; border-radius:8px; font-size:16px; font-weight:600; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">
                            <span>Bayar Sekarang</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                        <p id="snap-fallback-msg" style="margin-top:8px; font-size:13px; color:#94a3b8; display:none;">Popup pembayaran tidak tersedia di jaringan ini. Gunakan QRIS atau Virtual Account di bawah.</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->midtrans_qr_string): ?>
                            <div style="margin-top:16px; text-align:center;">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo e(urlencode($booking->midtrans_qr_string)); ?>" alt="QRIS" style="width:200px; height:200px;">
                                <p style="margin-top:8px; font-size:14px; color:#64748b;">Scan QRIS untuk pembayaran</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->midtrans_va_number): ?>
                            <div style="margin-top:16px; text-align:left;">
                                <p style="font-size:14px; color:#64748b; margin:0 0 4px 0;">Nomor Virtual Account:</p>
                                <div style="background:#fff; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                                    <strong style="font-size:18px; color:#0f172a;"><?php echo e($booking->midtrans_va_number); ?></strong>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <p style="margin-top:12px; font-size:12px; color:#94a3b8;">Setelah pembayaran, status akan diperbarui otomatis.</p>
                    </div>

                    <script src="https://cdn.midtrans.com/snap.js" data-client-key="<?php echo e(config('services.midtrans.client_key')); ?>"></script>
                    <script>
                        (function() {
                            var snapToken = '<?php echo e($snapToken); ?>';
                            if (!snapToken) return;

                            var button = document.getElementById('midtrans-snap-button');
                            var fallbackMsg = document.getElementById('snap-fallback-msg');

                            if (typeof snap === 'undefined') {
                                if (button) button.style.display = 'none';
                                if (fallbackMsg) fallbackMsg.style.display = 'block';
                                return;
                            }

                            button.addEventListener('click', function(e) {
                                e.preventDefault();
                                snap.pay(snapToken, {
                                    onSuccess: function(result) {
                                        window.location.href = '<?php echo e(route('booking.show', $booking->reference)); ?>?payment=success';
                                    },
                                    onPending: function(result) {
                                        window.location.href = '<?php echo e(route('booking.show', $booking->reference)); ?>?payment=pending';
                                    },
                                    onFailure: function(result) {
                                        window.location.href = '<?php echo e(route('booking.show', $booking->reference)); ?>?payment=failed';
                                    },
                                    onError: function(error) {
                                        alert('Terjadi kesalahan saat memproses pembayaran.');
                                    }
                                });
                            });
                        })();
                    </script>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="booking-confirmation-actions">
                    <a class="button button-outline" href="<?php echo e(route('treatment.show', $treatment['slug'])); ?>">Lihat Treatment</a>
                    <a class="button button-pink" href="https://wa.me/6281234567890?text=<?php echo e(rawurlencode('Halo Octa Beauty Care, saya ingin konfirmasi booking ' . $booking->reference)); ?>" target="_blank" rel="noopener noreferrer">Konfirmasi via WhatsApp</a>
                </div>
                <a class="booking-confirmation-home" href="<?php echo e(route('home')); ?>">Kembali ke Beranda</a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\booking-confirmation.blade.php ENDPATH**/ ?>