@extends('layouts.website')

@section('meta_title', 'Detail Transaksi | Octa Beauty Care')
@section('meta_description', 'Detail invoice transaksi perawatan kulit Anda di Octa Beauty Care.')

@section('content')
<style>
.profile-detail-page { padding: 48px 0; min-height: calc(100vh - 200px); }

.detail-card { background: var(--white); border: 1px solid var(--line); border-radius: 24px; padding: 36px; box-shadow: 0 4px 20px rgb(36 31 39 / 6%); margin-bottom: 28px; }

.detail-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 16px; }
.detail-header h1 { font-family: var(--serif); font-size: 30px; font-weight: 700; margin: 0; color: var(--ink); letter-spacing: -.03em; }
.detail-ref { font-family: var(--sans); font-size: 14px; font-weight: 800; background: var(--pink-pale); color: var(--pink-dark); padding: 8px 18px; border-radius: 12px; white-space: nowrap; border: 1px solid var(--pink); }

.detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 26px; margin-bottom: 30px; }
.detail-group h4 { font-family: var(--serif); font-size: 17px; font-weight: 700; margin: 0 0 16px; color: var(--ink); display: flex; align-items: center; gap: 10px; }
.detail-group h4 span { font-size: 15px; color: var(--pink-dark); }
.detail-row { display: flex; gap: 16px; margin-bottom: 12px; align-items: flex-start; }
.detail-row .label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .09em; color: var(--muted); min-width: 150px; flex-shrink: 0; }
.detail-row .value { font-size: 15px; color: var(--ink); font-weight: 500; word-break: break-word; }

.detail-total { background: var(--pink-pale); border: 1px solid var(--pink); border-radius: 18px; padding: 24px; margin-top: 10px; position: relative; overflow: hidden; }
.detail-total::before { content: ''; position: absolute; top: 0; left: 0; width: 6px; height: 100%; background: var(--pink); }
.detail-total .total-label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .09em; color: var(--pink-dark); margin-bottom: 8px; }
.detail-total .total-value { font-family: var(--serif); font-size: 28px; font-weight: 700; color: var(--ink); }

.status-chip { display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: 999px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; white-space: nowrap; }
.status-chip.paid { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
.status-chip.pending { background: #fef3c7; color: #b45309; border: 1px solid #fde68f; }
.status-chip.failed { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
.status-chip .dot { width: 7px; height: 7px; border-radius: 50%; }
.status-chip.paid .dot { background: #15803d; }
.status-chip.pending .dot { background: #b45309; }
.status-chip.failed .dot { background: #dc2626; }

.actions { display: flex; gap: 12px; margin-top: 26px; flex-wrap: wrap; }
.btn { padding: 14px 28px; border-radius: 14px; font-size: 15px; font-weight: 800; border: none; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); text-decoration: none; display: inline-block; text-align: center; white-space: nowrap; }
.btn-pink { background: var(--pink); color: #fff; box-shadow: 0 6px 16px rgb(200 55 106 / 20%); }
.btn-pink:hover { background: var(--pink-dark); transform: translateY(-2px); box-shadow: 0 10px 24px rgb(200 55 106 / 28%); }
.btn-pink:disabled { opacity: .7; cursor: not-allowed; transform: none; }
.btn-outline { border: 1px solid var(--line); background: var(--white); color: var(--ink); }
.btn-outline:hover { border-color: var(--pink); color: var(--pink-dark); background: var(--pink-pale); transform: translateY(-1px); }
.btn-light { border: 1px solid var(--line); background: var(--white); color: var(--muted); }
.btn-light:hover { background: #f9f5f7; color: var(--ink); border-color: var(--pink); }

.empty-back { text-align: center; padding: 72px 32px; background: var(--white); border: 1px solid var(--line); border-radius: 24px; box-shadow: 0 2px 12px rgb(36 31 39 / 5%); }
.empty-back h3 { font-family: var(--serif); font-size: 26px; font-weight: 700; margin: 0 0 12px; color: var(--ink); }
.empty-back p { color: var(--muted); font-size: 16px; margin: 0 0 28px; line-height: 1.7; }

.profile-flash { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 14px 20px; border-radius: 14px; font-size: 14px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px; animation: slideDown .4s ease; }
@keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

@media (max-width: 768px) {
    .detail-grid { grid-template-columns: 1fr; gap: 18px; }
    .detail-row { flex-direction: column; gap: 5px; align-items: flex-start; }
    .detail-row .label { min-width: auto; }
    .actions { flex-direction: column; }
    .btn { width: 100%; }
    .detail-card { padding: 24px; }
    .profile-detail-page { padding: 32px 0; }
}
</style>

@if (session('status'))
    <div class="profile-flash"><span aria-hidden="true">✦</span>{{ session('status') }}</div>
@endif

<section class="profile-detail-page">
    @if ($booking)
        <div class="detail-card">
            <div class="detail-header">
                <h1>Detail Transaksi</h1>
                <span class="detail-ref">{{ $booking->reference }}</span>
            </div>

            <div class="detail-grid">
                <div class="detail-group">
                    <h4><span>👤</span>Pelanggan</h4>
                    <div class="detail-row"><span class="label">Nama</span><span class="value">{{ $booking->name }}</span></div>
                    <div class="detail-row"><span class="label">Email</span><span class="value">{{ $booking->email }}</span></div>
                    <div class="detail-row"><span class="label">Telepon</span><span class="value">{{ $booking->phone }}</span></div>
                </div>

                <div class="detail-group">
                    <h4><span>💅</span>Treatment</h4>
                    <div class="detail-row"><span class="label">Layanan</span><span class="value">{{ $booking->treatment->name ?? $booking->treatment_slug }}</span></div>
                    <div class="detail-row"><span class="label">Tanggal</span><span class="value">{{ $booking->booking_date->format('d M Y') }}</span></div>
                    <div class="detail-row"><span class="label">Waktu</span><span class="value">{{ $booking->booking_time }} WIB</span></div>
                    @if ($booking->notes)
                        <div class="detail-row"><span class="label">Catatan</span><span class="value">{{ $booking->notes }}</span></div>
                    @endif
                </div>
            </div>

            <div class="detail-group" style="grid-column: 1 / -1;">
                <h4><span>💳</span>Pembayaran</h4>
                <div class="detail-row"><span class="label">Metode</span><span class="value">{{ $booking->midtrans_payment_type ?? 'Belum ditetapkan' }}</span></div>
                <div class="detail-row"><span class="label">Total Pembayaran</span><span class="value">{{ number_format($booking->total_amount, 0, ',', '.') }}</span></div>
                @if ($booking->promotion_code)
                    <div class="detail-row"><span class="label">Promo</span><span class="value">{{ $booking->promotion_code }}</span></div>
                @endif
                <div class="detail-row"><span class="label">Status Transaksi</span>
                    <span class="status-chip {{ $booking->payment_status === 'dikonfirmasi' ? 'paid' : ($booking->payment_status === 'menunggu_verifikasi' ? 'pending' : 'failed') }}">
                        <span class="dot"></span>
                        {{ $booking->payment_status === 'dikonfirmasi' ? 'Lunas' : ($booking->payment_status === 'menunggu_verifikasi' ? 'Menunggu Pembayaran' : 'Gagal / Kadaluarsa') }}
                    </span>
                </div>
                <div class="detail-row"><span class="label">Tanggal Pemesanan</span><span class="value">{{ $booking->created_at->format('d M Y H:i') }}</span></div>
                @if ($booking->midtrans_paid_at)
                    <div class="detail-row"><span class="label">Waktu Pembayaran</span><span class="value">{{ $booking->midtrans_paid_at->format('d M Y H:i') }}</span></div>
                @endif
                <div class="detail-total">
                    <div class="total-label">Total yang Harus Dibayar</div>
                    <div class="total-value">{{ number_format($booking->total_amount, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="actions">
                @if ($booking->payment_status === 'menunggu_verifikasi')
                    <button class="btn btn-pink btn-pay-detail" data-reference="{{ $booking->reference }}">Bayar Sekarang</button>
                @endif
                <a href="{{ route('profile') }}" class="btn btn-outline">Kembali ke Profil</a>
                <a href="{{ route('home') }}" class="btn btn-light">Kembali ke Beranda</a>
            </div>
        </div>
    @else
        <div class="empty-back">
            <h3>Transaksi tidak ditemukan</h3>
            <p>Transaksi yang Anda cari tidak tersedia atau bukan milik Anda.</p>
            <a href="{{ route('profile') }}" class="btn btn-pink">Kembali ke Profil</a>
        </div>
    @endif
</section>

@push('scripts')
<script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
(function() {
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-pay-detail')) {
            e.preventDefault();
            var btn = e.target;
            var reference = btn.dataset.reference;
            btn.disabled = true;
            btn.textContent = 'Memuat...';
            btn.style.opacity = '0.7';

            fetch('/profil/transaksi/' + encodeURIComponent(reference) + '/bayar', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.error) {
                    alert(data.error);
                    btn.disabled = false;
                    btn.textContent = 'Bayar Sekarang';
                    btn.style.opacity = '1';
                    return;
                }
                var snapToken = data.snap_token;
                if (typeof snap === 'undefined') {
                    alert('Sistem pembayaran tidak dapat dimuat. Silakan coba lagi nanti.');
                    btn.disabled = false;
                    btn.textContent = 'Bayar Sekarang';
                    btn.style.opacity = '1';
                    return;
                }
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        window.location.reload();
                    },
                    onPending: function(result) {
                        window.location.reload();
                    },
                    onError: function(error) {
                        alert('Terjadi kesalahan saat memproses pembayaran.');
                        btn.disabled = false;
                        btn.textContent = 'Bayar Sekarang';
                        btn.style.opacity = '1';
                    }
                });
            })
            .catch(function() {
                alert('Gagal memuat token pembayaran.');
                btn.disabled = false;
                btn.textContent = 'Bayar Sekarang';
                btn.style.opacity = '1';
            });
        }
    });

    if (!document.querySelector('meta[name="csrf-token"]')) {
        var meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = '{{ csrf_token() }}';
        document.head.appendChild(meta);
    }
})();
</script>
@endpush