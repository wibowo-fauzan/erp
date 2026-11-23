<!-- Filters -->
<div class="profile-filters">
    <button type="button" class="profile-filter-chip {{ $filter === 'all' ? 'active' : '' }}" data-filter="all" onclick="app.filterTransactions('all', this)">
        <span class="chip-icon">✦</span> Semua <span class="chip-count">{{ $stats['total'] }}</span>
    </button>
    <button type="button" class="profile-filter-chip {{ $filter === 'unpaid' ? 'active' : '' }}" data-filter="unpaid" onclick="app.filterTransactions('unpaid', this)">
        <span class="chip-icon">🕒</span> Belum Dibayar <span class="chip-count">{{ $stats['unpaid'] }}</span>
    </button>
    <button type="button" class="profile-filter-chip {{ $filter === 'paid' ? 'active' : '' }}" data-filter="paid" onclick="app.filterTransactions('paid', this)">
        <span class="chip-icon">✓</span> Berhasil <span class="chip-count">{{ $stats['paid'] }}</span>
    </button>
    <button type="button" class="profile-filter-chip {{ $filter === 'failed' ? 'active' : '' }}" data-filter="failed" onclick="app.filterTransactions('failed', this)">
        <span class="chip-icon">✕</span> Gagal / Kadaluarsa <span class="chip-count">{{ $stats['failed'] }}</span>
    </button>
</div>

<div class="profile-history-header">
    <h2 class="profile-history-title">Riwayat Pembayaran</h2>
    @if ($bookings->isEmpty() && $filter !== 'all')
        <a href="{{ route('treatment') }}" class="button button-pink button-small">Lihat Semua Treatment</a>
    @endif
</div>

@if ($bookings->isEmpty())
    <div class="profile-empty">
        <div class="profile-empty-icon">✦</div>
        @if ($filter !== 'all')
            <h3>Belum ada transaksi {{ $filter === 'unpaid' ? 'yang menunggu pembayaran' : ($filter === 'paid' ? 'yang berhasil' : 'gagal / kadaluarsa') }}</h3>
            <p>Tidak ditemukan transaksi dengan status ini. Coba pilih filter "Semua" atau mulai perawatan pertama Anda.</p>
        @else
            <h3>Belum ada riwayat transaksi</h3>
            <p>Mulai perawatan pertamamu bersama Beautycare dan lihat riwayat pembayaran di sini.</p>
        @endif
        <a href="{{ route('treatment') }}" class="button button-pink" style="padding:14px 32px;font-size:15px;font-weight:800">Jelajahi Treatment</a>
    </div>
@else
    <div class="profile-transactions">
        @foreach ($bookings as $booking)
            <div class="transaction-card" data-reference="{{ $booking->reference }}">
                <div class="transaction-top">
                    <div>
                        <div class="transaction-title">{{ $booking->treatment->name ?? $booking->treatment_slug }}</div>
                        <div class="transaction-invoice">Invoice: <strong>{{ $booking->reference }}</strong></div>
                    </div>
                    <span class="status-badge {{ $booking->payment_status === 'dikonfirmasi' ? 'status-paid' : ($booking->payment_status === 'menunggu_verifikasi' ? 'status-pending' : 'status-failed') }}">
                        <span class="dot"></span>
                        {{ $booking->payment_status === 'dikonfirmasi' ? 'Lunas' : ($booking->payment_status === 'menunggu_verifikasi' ? 'Belum Dibayar' : 'Gagal / Kadaluarsa') }}
                    </span>
                </div>
                <div class="transaction-meta">
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Tanggal</span><span class="transaction-meta-value">{{ $booking->booking_date->format('d M Y') }}</span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Waktu</span><span class="transaction-meta-value">{{ $booking->booking_time }} WIB</span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Metode</span><span class="transaction-meta-value">{{ $booking->midtrans_payment_type ?? '-' }}</span></div>
                    <div class="transaction-meta-item"><span class="transaction-meta-label">Status Booking</span><span class="transaction-meta-value">{{ ucfirst($booking->status) }}</span></div>
                </div>
                <div class="transaction-total">Total: {{ number_format($booking->total_amount, 0, ',', '.') }}</div>
                <div class="transaction-bottom">
                    <div class="transaction-actions-group">
                        @if ($booking->payment_status === 'menunggu_verifikasi')
                            <button class="btn-pay btn-pay-{{ $booking->id }}" data-reference="{{ $booking->reference }}" data-total="{{ $booking->total_amount }}">
                                Bayar Sekarang
                            </button>
                        @endif
                        <button class="btn-detail btn-view-detail" data-reference="{{ $booking->reference }}">Lihat Detail</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="profile-pagination">
        {{ $bookings->links() }}
    </div>
@endif
