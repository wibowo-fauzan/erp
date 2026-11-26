<!-- Filters -->
<div class="profile-filters">
    <button type="button" class="profile-filter-chip <?php echo e($filter === 'all' ? 'active' : ''); ?>" data-filter="all" onclick="app.filterTransactions('all', this)">
        <span class="chip-icon">✦</span> Semua <span class="chip-count"><?php echo e($stats['total']); ?></span>
    </button>
    <button type="button" class="profile-filter-chip <?php echo e($filter === 'unpaid' ? 'active' : ''); ?>" data-filter="unpaid" onclick="app.filterTransactions('unpaid', this)">
        <span class="chip-icon">🕒</span> Belum Dibayar <span class="chip-count"><?php echo e($stats['unpaid']); ?></span>
    </button>
    <button type="button" class="profile-filter-chip <?php echo e($filter === 'paid' ? 'active' : ''); ?>" data-filter="paid" onclick="app.filterTransactions('paid', this)">
        <span class="chip-icon">✓</span> Berhasil <span class="chip-count"><?php echo e($stats['paid']); ?></span>
    </button>
    <button type="button" class="profile-filter-chip <?php echo e($filter === 'failed' ? 'active' : ''); ?>" data-filter="failed" onclick="app.filterTransactions('failed', this)">
        <span class="chip-icon">✕</span> Gagal / Kadaluarsa <span class="chip-count"><?php echo e($stats['failed']); ?></span>
    </button>
</div>

<div class="profile-history-header">
    <h2 class="profile-history-title">Riwayat Pembayaran</h2>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->isEmpty() && $filter !== 'all'): ?>
        <a href="<?php echo e(route('treatment')); ?>" class="button button-pink button-small">Lihat Semua Treatment</a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bookings->isEmpty()): ?>
    <div class="profile-empty">
        <div class="profile-empty-icon">✦</div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($filter !== 'all'): ?>
            <h3>Belum ada transaksi <?php echo e($filter === 'unpaid' ? 'yang menunggu pembayaran' : ($filter === 'paid' ? 'yang berhasil' : 'gagal / kadaluarsa')); ?></h3>
            <p>Tidak ditemukan transaksi dengan status ini. Coba pilih filter "Semua" atau mulai perawatan pertama Anda.</p>
        <?php else: ?>
            <h3>Belum ada riwayat transaksi</h3>
            <p>Mulai perawatan pertamamu bersama Beautycare dan lihat riwayat pembayaran di sini.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <a href="<?php echo e(route('treatment')); ?>" class="button button-pink" style="padding:14px 32px;font-size:15px;font-weight:800">Jelajahi Treatment</a>
    </div>
<?php else: ?>
    <div class="profile-transactions">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="transaction-card" data-reference="<?php echo e($booking->reference); ?>">
                <div class="transaction-top">
                    <div>
                        <div class="transaction-title"><?php echo e($booking->treatment->name ?? $booking->treatment_slug); ?></div>
                        <div class="transaction-invoice">Invoice: <strong><?php echo e($booking->reference); ?></strong></div>
                    </div>
                    <span class="status-badge <?php echo e($booking->payment_status === 'dikonfirmasi' ? 'status-paid' : ($booking->payment_status === 'menunggu_verifikasi' ? 'status-pending' : 'status-failed')); ?>">
                        <span class="dot"></span>
                        <?php echo e($booking->payment_status === 'dikonfirmasi' ? 'Lunas' : ($booking->payment_status === 'menunggu_verifikasi' ? 'Belum Dibayar' : 'Gagal / Kadaluarsa')); ?>

                    </span>
                </div>
                <div class="transaction-meta">
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Tanggal</span><span class="transaction-meta-value"><?php echo e($booking->booking_date->format('d M Y')); ?></span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Waktu</span><span class="transaction-meta-value"><?php echo e($booking->booking_time); ?> WIB</span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Metode</span><span class="transaction-meta-value"><?php echo e($booking->midtrans_payment_type ?? '-'); ?></span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Status Booking</span><span class="transaction-meta-value"><?php echo e(ucfirst($booking->status)); ?></span></div>
                </div>
                <div class="transaction-total">Total: <?php echo e(number_format($booking->total_amount, 0, ',', '.')); ?></div>
                <div class="transaction-bottom">
                    <div class="transaction-actions-group">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($booking->payment_status === 'menunggu_verifikasi'): ?>
                            <button class="btn-pay btn-pay-<?php echo e($booking->id); ?>" data-reference="<?php echo e($booking->reference); ?>" data-total="<?php echo e($booking->total_amount); ?>">
                                Bayar Sekarang
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button class="btn-detail btn-view-detail" data-reference="<?php echo e($booking->reference); ?>">Lihat Detail</button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="profile-pagination">
        <?php echo e($bookings->links()); ?>

    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\erp\resources\views/profile-transactions-list.blade.php ENDPATH**/ ?>