<div class="filament-pages-laporan">
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Laporan</h2>
            <p class="text-gray-500">Lihat perkembangan booking, transaksi, dan operasional per periode.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-gray-900 mb-4">Laporan Booking</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Booking</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Menunggu Konfirmasi</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dikonfirmasi</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Selesai</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dibatalkan</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-gray-900 mb-4">Laporan Transaksi</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nilai Transaksi</span>
                        <span class="text-gray-900 font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Terverifikasi</span>
                        <span class="text-gray-900 font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Menunggu Verifikasi</span>
                        <span class="text-gray-900 font-medium">Rp 0</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="font-semibold text-gray-900 mb-4">Laporan Operasional</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Treatment Terpopuler</span>
                        <span class="text-gray-900 font-medium">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Pelanggan Baru</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Penggunaan Treatment</span>
                        <span class="text-gray-900 font-medium">0</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-900">Filter Laporan</h3>
                <div class="flex gap-2">
                    <input type="date" name="start_date" placeholder="Dari Tanggal" class="border rounded px-3 py-2 text-sm"/>
                    <input type="date" name="end_date" placeholder="Sampai Tanggal" class="border rounded px-3 py-2 text-sm"/>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tampilkan</button>
                </div>
            </div>
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
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                            <td class="px-4 py-3 text-sm text-gray-600">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-3 text-xs text-gray-500">Data laporan akan ditampilkan setelah filter diterapkan.</p>
        </div>
    </div>
</div>
