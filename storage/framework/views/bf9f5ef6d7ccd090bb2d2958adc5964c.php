<?php $__env->startSection('content'); ?>
<section class="container" style="padding:48px 0">
    <h1 style="font-family:'Playfair Display',serif;margin-bottom:24px">Booking Saya</h1>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->isEmpty()): ?>
        <p>Belum ada booking. <a href="<?php echo e(route('booking.create')); ?>">Buat booking sekarang</a>.</p>
    <?php else: ?>
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Referensi</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Treatment</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Tanggal</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Waktu</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Status</th>
                    <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($booking->reference); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($treatments[$booking->treatment_slug]['name'] ?? $booking->treatment_slug); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($booking->booking_date->format('d M Y')); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($booking->booking_time); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($booking->status); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f5f5f5"><?php echo e($booking->payment_status); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\erp\resources\views\my-bookings.blade.php ENDPATH**/ ?>