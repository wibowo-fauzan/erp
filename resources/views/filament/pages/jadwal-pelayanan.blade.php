<div class="filament-pages-jadwal-pelayanan">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Jadwal Pelayanan</h2>
            <p class="text-gray-500">Atur ketersediaan jadwal treatment agar pelanggan dapat booking.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Jadwal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Mulai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Selesai</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aktif</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($availabilities as $availability)
                        @php
                            $typeLabel = match($availability->type) {
                                'full_day' => 'Hari Penuh',
                                'partial_day' => 'Parcial',
                                'recurring' => 'Berulang',
                                default => $availability->type,
                            };
                            $typeClass = match($availability->type) {
                                'full_day' => 'bg-yellow-100 text-yellow-700',
                                'partial_day' => 'bg-info-100 text-info-700',
                                'recurring' => 'bg-primary-100 text-primary-700',
                                default => 'bg-gray-100 text-gray-700',
                            };
                            $dayLabels = [
                                1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis',
                                5 => 'Jumat', 6 => 'Sabtu', 0 => 'Minggu',
                            ];
                            $days = $availability->days_of_week ?? [];
                            $daysLabel = $availability->type === 'recurring'
                                ? implode(', ', array_map(fn ($d) => $dayLabels[$d] ?? $d, $days))
                                : '-';
                        @endphp
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $availability->title }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $typeClass }}">
                                    {{ $typeLabel }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $availability->start_date }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $availability->end_date ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ $availability->start_time ?? '-' }}{{ $availability->end_time ? ' - ' . $availability->end_time : '' }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $daysLabel }}</td>
                            <td class="px-4 py-3 text-sm">
                                {{ $availability->is_active ? 'Ya' : 'Tidak' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada jadwal pelayanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="font-semibold text-gray-900 mb-4">Panduan Jadwal</h3>
            <ul class="list-disc list-inside text-sm text-gray-600 space-y-2">
                <li><strong>Hari Penuh (Libur):</strong> Semua waktu pada tanggal tersebut diblokir.</li>
                <li><strong>Parcial (Jam Tertentu):</strong> Hanya waktu dalam rentang yang tersedia.</li>
                <li><strong>Berulang (Setiap Minggu):</strong> Jadwal berlaku untuk hari-hari yang dipilih setiap minggu.</li>
                <li>Atur jadwal melalui menu <em>Jadwal Tersedia</em> di sidebar admin.</li>
            </ul>
        </div>
    </div>
</div>
