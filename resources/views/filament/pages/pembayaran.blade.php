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
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Referensi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Treatment</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bukti Transfer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">OCTA-20261024-ABC123DEFG</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Test User</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Octa Signature Glow</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Rp 250.000</td>
                        <td class="px-4 py-3 text-sm text-gray-600">-</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 border border-yellow-200">
                                <span></span>
                                Menunggu Verifikasi
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button class="text-blue-600 hover:text-blue-800 font-medium">Verifikasi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="font-semibold text-gray-900 mb-4">Panduan Verifikasi</h3>
            <ul class="list-disc list-inside text-sm text-gray-600 space-y-2">
                <li>Pastikan nominal transfer sesuai dengan harga treatment yang dibooking.</li>
                <li>Cek bukti transfer yang diunggah pelanggan melalui aplikasi perbankan.</li>
                <li>Jika valid, tetapkan status ke "Dikonfirmasi".</li>
                <li>Jika tidak valid, tetapkan status ke "Ditolak" dan berikan keterangan.</li>
                <li>Status pembayaran akan secara otomatis memperbarui status booking.</li>
            </ul>
        </div>
    </div>
</div>
