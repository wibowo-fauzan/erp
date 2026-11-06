<div class="filament-pages-pembayaran">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Verifikasi Pembayaran</h2>
            <p class="text-gray-500">Cocokkan bukti transfer dengan tagihan booking dan tetapkan status verifikasi.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nomor Booking</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Treatment</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal Tagihan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bukti Transfer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($bookings as $booking)
                        @php
                            $badgeClass = match($booking->payment_status) {
                                'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                                'dikonfirmasi' => 'bg-green-100 text-green-700',
                                default => 'bg-red-100 text-red-700',
                            };
                            $badgeLabel = match($booking->payment_status) {
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                default => 'Ditolak',
                            };
                        @endphp
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $booking->reference }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $booking->user?->name ?? $booking->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ \App\Models\Treatment::query()->where('slug', $booking->treatment_slug)->value('name') ?? $booking->treatment_slug }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">
                                @if($booking->payment_proof)
                                    <a href="{{ Storage::url($booking->payment_proof) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">Lihat Bukti</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                                    {{ $badgeLabel }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if($booking->payment_status === 'menunggu_verifikasi')
                                    <div class="flex gap-2">
                                        <form method="POST" action="{{ route('admin.pembayaran.verifikasi', $booking->reference) }}" onsubmit="return confirm('Konfirmasi pembayaran booking ini?')">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-800 text-sm font-medium">Verifikasi</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.pembayaran.tolak', $booking->reference) }}" onsubmit="return confirm('Tolak pembayaran booking ini?')">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Tolak</button>
                                        </form>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-3 text-sm text-gray-600 text-center">Tidak ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="font-semibold text-gray-900 mb-4">Panduan Verifikasi</h3>
            <ul class="list-disc list-inside text-sm text-gray-600 space-y-2">
                <li>Pastikan nominal transfer sesuai dengan biaya treatment yang dibooking.</li>
                <li>Cek bukti transfer yang diunggah pelanggan melalui aplikasi perbankan.</li>
                <li>Jika valid, tetapkan status ke "Dikonfirmasi".</li>
                <li>Jika tidak valid, tetapkan status ke "Ditolak" dan berikan keterangan.</li>
                <li>Status pembayaran akan secara otomatis memperbarui status booking.</li>
            </ul>
        </div>
    </div>
</div>
