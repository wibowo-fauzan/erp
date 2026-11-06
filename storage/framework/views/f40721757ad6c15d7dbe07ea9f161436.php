<div class="filament-pages-jadwal-pelayanan">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Jadwal Pelayanan</h2>
            <p class="text-gray-500">Atur jam operasional dan ketersediaan waktu untuk booking treatment.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Jadwal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Mulai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Selesai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Mulai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Selesai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aktif</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat Oleh</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $typeLabel = match($availability->type) {
                                'full_day' => 'Hari Penuh (Libur)',
                                'partial_day' => 'Parcial (Jam Tertentu)',
                                'recurring' => 'Berulang (Setiap Minggu)',
                                default => $availability->type,
                            };
                        ?>
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo e($availability->title); ?></td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($typeLabel); ?></td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e(\Illuminate\Support\Carbon::parse($availability->start_date)->format('d M Y')); ?></td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($availability->end_date ? \Illuminate\Support\Carbon::parse($availability->end_date)->format('d M Y') : '-'); ?></td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($availability->start_time ?? '-'); ?></td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e($availability->end_time ?? '-'); ?></td>
                            <td class="px-4 py-3 text-sm">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($availability->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($availability->is_active ? 'Aktif' : 'Tidak Aktif'); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600"><?php echo e(optional($availability->creator)->name ?? '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data jadwal tersedia.</td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\erp\resources\views\filament\pages\jadwal-pelayanan.blade.php ENDPATH**/ ?>