<div class="filament-pages-laporan">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Laporan</h2>
            <p class="text-gray-500">Lihat perkembangan booking, transaksi, pelayanan, dan operasional per periode.</p>
        </div>

        {{ $this->form }}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if ($jenis_laporan === 'booking' || $jenis_laporan === null)
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Booking</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Booking</span>
                            <span class="text-gray-900 font-medium">{{ $stats['total'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Menunggu Konfirmasi</span>
                            <span class="text-gray-900 font-medium">{{ $stats['menunggu_konfirmasi'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dikonfirmasi</span>
                            <span class="text-gray-900 font-medium">{{ $stats['dikonfirmasi'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selesai</span>
                            <span class="text-gray-900 font-medium">{{ $stats['selesai'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dibatalkan</span>
                            <span class="text-gray-900 font-medium">{{ $stats['dibatalkan'] }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if ($jenis_laporan === 'pembayaran')
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Transaksi / Pembayaran</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nilai Transaksi</span>
                            <span class="text-gray-900 font-medium">Rp {{ number_format($paymentStats['total_nilai'] ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Terverifikasi</span>
                            <span class="text-gray-900 font-medium">Rp {{ number_format($paymentStats['dikonfirmasi_nilai'] ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Menunggu Verifikasi</span>
                            <span class="text-gray-900 font-medium">Rp {{ number_format($paymentStats['menunggu_nilai'] ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if ($jenis_laporan === 'pelayanan')
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Laporan Pelayanan</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Pelayanan</span>
                            <span class="text-gray-900 font-medium">{{ $pelayananStats['total_pelayanan'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelayanan Selesai</span>
                            <span class="text-gray-900 font-medium">{{ $pelayananStats['selesai_pelayanan'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelayanan Dibatalkan</span>
                            <span class="text-gray-900 font-medium">{{ $pelayananStats['batal_pelayanan'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Treatment Terbanyak</span>
                            <span class="text-gray-900 font-medium">{{ $pelayananStats['treatment_terbanyak'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jenis Treatment Terpakai</span>
                            <span class="text-gray-900 font-medium">{{ $pelayananStats['jumlah_treatment_terpakai'] }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if ($jenis_laporan === 'operasional')
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="font-semibold text-gray-900 mb-4">Ringkasan Operasional</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Booking</span>
                            <span class="text-gray-900 font-medium">{{ $operasionalStats['total_booking'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pelanggan Baru</span>
                            <span class="text-gray-900 font-medium">{{ $operasionalStats['pelanggan_baru'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Treatment Tersedia</span>
                            <span class="text-gray-900 font-medium">{{ $operasionalStats['treatment_tersedia'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Booking Selesai</span>
                            <span class="text-gray-900 font-medium">{{ $operasionalStats['booking_selesai'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Booking Dibatalkan</span>
                            <span class="text-gray-900 font-medium">{{ $operasionalStats['booking_batal'] }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if ($jenis_laporan === 'booking' || $jenis_laporan === null)
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
                        @forelse ($bookings as $booking)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Illuminate\Support\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $booking->reference }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \App\Models\Treatment::query()->where('slug', $booking->treatment_slug)->value('name') ?? $booking->treatment_slug }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $booking->user?->name ?? $booking->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium @switch($booking->status)
                                        @case('menunggu_konfirmasi') bg-yellow-100 text-yellow-700 @break
                                        @case('dikonfirmasi') bg-green-100 text-green-700 @break
                                        @case('selesai') bg-blue-100 text-blue-700 @break
                                        @default bg-red-100 text-red-700 @endswitch">
                                        {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data booking untuk periode yang dipilih.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if ($jenis_laporan === 'pembayaran')
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
                        @forelse ($bookings as $booking)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Illuminate\Support\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $booking->reference }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $booking->user?->name ?? $booking->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium @switch($booking->payment_status)
                                        @case('dikonfirmasi') bg-green-100 text-green-700 @break
                                        @case('menunggu_verifikasi') bg-yellow-100 text-yellow-700 @break
                                        @default bg-red-100 text-red-700 @endswitch">
                                        {{ ucwords(str_replace('_', ' ', $booking->payment_status)) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data transaksi untuk periode yang dipilih.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
