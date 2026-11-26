<div class="filament-pages-laporan">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Laporan</h2>
            <p class="text-gray-500">Lihat perkembangan booking, transaksi, pelayanan, dan operasional per periode.</p>
        </div>

        <?php echo e($this->form); ?>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'booking' || $jenis_laporan === null): ?>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Booking</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Booking</span>
                            <span class="text-gray-900 font-medium"><?php echo e($stats['total']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Menunggu Konfirmasi</span>
                            <span class="text-gray-900 font-medium"><?php echo e($stats['menunggu_konfirmasi']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dikonfirmasi</span>
                            <span class="text-gray-900 font-medium"><?php echo e($stats['dikonfirmasi']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selesai</span>
                            <span class="text-gray-900 font-medium"><?php echo e($stats['selesai']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dibatalkan</span>
                            <span class="text-gray-900 font-medium"><?php echo e($stats['dibatalkan']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'pembayaran'): ?>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Transaksi / Pembayaran</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nilai Transaksi</span>
                            <span class="text-gray-900 font-medium">Rp <?php echo e(number_format($paymentStats['total_nilai'] ?? 0, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Terverifikasi</span>
                            <span class="text-gray-900 font-medium">Rp <?php echo e(number_format($paymentStats['dikonfirmasi_nilai'] ?? 0, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Menunggu Verifikasi</span>
                            <span class="text-gray-900 font-medium">Rp <?php echo e(number_format($paymentStats['menunggu_nilai'] ?? 0, 0, ',', '.')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'pelayanan'): ?>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Pelayanan</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Pelayanan</span>
                            <span class="text-gray-900 font-medium"><?php echo e($pelayananStats['total_pelayanan']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelayanan Selesai</span>
                            <span class="text-gray-900 font-medium"><?php echo e($pelayananStats['selesai_pelayanan']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelayanan Dibatalkan</span>
                            <span class="text-gray-900 font-medium"><?php echo e($pelayananStats['batal_pelayanan']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Treatment Terbanyak</span>
                            <span class="text-gray-900 font-medium"><?php echo e($pelayananStats['treatment_terbanyak']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jenis Treatment Terpakai</span>
                            <span class="text-gray-900 font-medium"><?php echo e($pelayananStats['jumlah_treatment_terpakai']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'operasional'): ?>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Ringkasan Operasional</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Booking</span>
                            <span class="text-gray-900 font-medium"><?php echo e($operasionalStats['total_booking']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelanggan Baru</span>
                            <span class="text-gray-900 font-medium"><?php echo e($operasionalStats['pelanggan_baru']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Treatment Tersedia</span>
                            <span class="text-gray-900 font-medium"><?php echo e($operasionalStats['treatment_tersedia']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Booking Selesai</span>
                            <span class="text-gray-900 font-medium"><?php echo e($operasionalStats['booking_selesai']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Booking Dibatalkan</span>
                            <span class="text-gray-900 font-medium"><?php echo e($operasionalStats['booking_batal']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'booking' || $jenis_laporan === null): ?>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Treatment</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo e(\Illuminate\Support\Carbon::parse($booking->created_at)->format('d M Y')); ?></td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo e($booking->reference); ?></td>
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo e(\App\Models\Treatment::query()->where('slug', $booking->treatment_slug)->value('name') ?? $booking->treatment_slug); ?></td>
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($booking->user?->name ?? $booking->name); ?></td>
                                <td class="px-4 py-3 text-sm text-gray-600">Rp <?php echo e(number_format($booking->total_amount ?? 0, 0, ',', '.')); ?></td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium <?php switch($booking->status):
                                        case ('menunggu_konfirmasi'): ?> bg-yellow-100 text-yellow-700 <?php break; ?>
                                        <?php case ('dikonfirmasi'): ?> bg-green-100 text-green-700 <?php break; ?>
                                        <?php case ('selesai'): ?> bg-blue-100 text-blue-700 <?php break; ?>
                                        <?php default: ?> bg-red-100 text-red-700 <?php endswitch; ?>">
                                        <?php echo e(ucwords(str_replace('_', ' ', $booking->status))); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data booking untuk periode yang dipilih.</td>
                            </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($jenis_laporan === 'pembayaran'): ?>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="font-semibold text-gray-900 mb-4">Detail Transaksi</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo e(\Illuminate\Support\Carbon::parse($booking->created_at)->format('d M Y')); ?></td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo e($booking->reference); ?></td>
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($booking->user?->name ?? $booking->name); ?></td>
                                <td class="px-4 py-3 text-sm text-gray-600">Rp <?php echo e(number_format($booking->total_amount ?? 0, 0, ',', '.')); ?></td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium <?php switch($booking->payment_status):
                                        case ('dikonfirmasi'): ?> bg-green-100 text-green-700 <?php break; ?>
                                        <?php case ('menunggu_verifikasi'): ?> bg-yellow-100 text-yellow-700 <?php break; ?>
                                        <?php default: ?> bg-red-100 text-red-700 <?php endswitch; ?>">
                                        <?php echo e(ucwords(str_replace('_', ' ', $booking->payment_status))); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data transaksi untuk periode yang dipilih.</td>
                            </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\erp\resources\views/filament/pages/laporan.blade.php ENDPATH**/ ?>