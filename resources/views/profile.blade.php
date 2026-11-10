@extends('layouts.website')

@section('meta_title', 'Profil & Riwayat Pembayaran | Octa Beauty Care')
@section('meta_description', 'Kelola informasi akun dan lihat riwayat transaksi perawatan kulit Anda di Octa Beauty Care.')

@section('content')
<style>
/* ===== Profile Page Design System ===== */
.profile-page { padding: 48px 0; min-height: calc(100vh - 200px); }

/* Header Card */
.profile-hero { background: var(--white); border: 1px solid var(--line); border-radius: 24px; padding: 40px; box-shadow: 0 4px 20px rgb(36 31 39 / 6%); margin-bottom: 32px; position: relative; overflow: hidden; }
.profile-hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, var(--pink-pale) 0%, transparent 60%); opacity: 0.6; pointer-events: none; }
.profile-hero-grid { display: grid; grid-template-columns: 110px 1fr; gap: 32px; align-items: center; position: relative; z-index: 2; }
.profile-avatar-wrap { position: relative; display: inline-block; width: 110px; height: 110px; }
.profile-avatar { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; border: 4px solid var(--white); box-shadow: 0 12px 32px rgb(36 31 39 / 12%); background: var(--white); transform: scale(1); transition: transform .3s cubic-bezier(0.4, 0, 0.2, 1); }
.profile-avatar-wrap:hover .profile-avatar { transform: scale(1.05); }
.profile-avatar-placeholder { width: 100%; height: 100%; border-radius: 50%; background: linear-gradient(135deg, var(--pink-pale) 0%, var(--rose) 100%); display: grid; place-items: center; font-family: var(--serif); font-size: 34px; font-weight: 700; color: var(--pink-dark); border: 4px solid var(--white); box-shadow: 0 12px 32px rgb(36 31 39 / 12%); }
.profile-avatar-badge { position: absolute; bottom: 6px; right: 6px; width: 32px; height: 32px; border-radius: 50%; background: var(--white); border: 2px solid var(--pink); display: grid; place-items: center; font-size: 14px; color: var(--pink-dark); box-shadow: 0 4px 12px rgb(36 31 39 / 10%); cursor: pointer; transition: transform .2s ease; }
.profile-avatar-badge:hover { transform: scale(1.1); background: var(--pink); color: #fff; }

.profile-info { padding-top: 8px; }
.profile-name { font-family: var(--serif); font-size: 34px; font-weight: 700; margin: 0 0 8px; color: var(--ink); letter-spacing: -.03em; }
.profile-role { font-size: 15px; color: var(--pink-dark); font-weight: 600; text-transform: uppercase; letter-spacing: .12em; margin-bottom: 16px; display: inline-flex; align-items: center; gap: 8px; }
.profile-role-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--pink); }
.profile-meta { display: flex; flex-direction: column; gap: 10px; }
.profile-meta-item { display: flex; align-items: center; gap: 14px; font-size: 15px; color: var(--ink); padding: 10px 14px; background: #fcfafa; border: 1px solid var(--line); border-radius: 12px; transition: all .2s ease; cursor: default; }
.profile-meta-item:hover { border-color: var(--pink); background: var(--pink-pale); }
.profile-meta-item .label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: var(--muted); min-width: 88px; }
.profile-meta-item .value { font-weight: 500; word-break: break-word; }
.profile-actions { margin-top: 20px; display: flex; gap: 10px; flex-wrap: wrap; }

/* Stats Grid */
.profile-stats { margin-bottom: 32px; }
.profile-stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.profile-stat-card { background: var(--white); border: 1px solid var(--line); border-radius: 18px; padding: 22px 18px; display: flex; flex-direction: column; gap: 10px; box-shadow: 0 2px 12px rgb(36 31 39 / 5%); transition: all .3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; }
.profile-stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--pink); transform: scaleX(0); transition: transform .3s ease; transform-origin: left; }
.profile-stat-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgb(36 31 39 / 12%); border-color: var(--pink); }
.profile-stat-card:hover::before { transform: scaleX(1); }
.profile-stat-card.total { border-left: 4px solid var(--pink); }
.profile-stat-card.total::before { background: var(--pink); }
.profile-stat-card.paid { border-left: 4px solid #15803d; }
.profile-stat-card.paid::before { background: #15803d; }
.profile-stat-card.unpaid { border-left: 4px solid #b45309; }
.profile-stat-card.unpaid::before { background: #b45309; }
.profile-stat-card.failed { border-left: 4px solid #dc2626; }
.profile-stat-card.failed::before { background: #dc2626; }
.profile-stat-value { font-family: var(--serif); font-size: 32px; font-weight: 700; color: var(--ink); line-height: 1; }
.profile-stat-label { font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: .09em; color: var(--muted); }

/* Filters */
.profile-filters { display: flex; gap: 10px; margin-bottom: 24px; flex-wrap: wrap; }
.profile-filter-tab { padding: 12px 20px; border-radius: 14px; border: 1px solid var(--line); background: var(--white); color: var(--muted); font-size: 14px; font-weight: 600; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); white-space: nowrap; display: inline-flex; align-items: center; gap: 8px; position: relative; overflow: hidden; text-decoration: none; }
.profile-filter-tab::before { content: ''; position: absolute; inset: 0; background: var(--pink-pale); transform: scaleX(0); transition: transform .25s ease; transform-origin: left; z-index: 0; }
.profile-filter-tab span, .profile-filter-tab .count { position: relative; z-index: 1; }
.profile-filter-tab:hover { border-color: var(--pink); color: var(--pink-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgb(200 55 106 / 12%); text-decoration: none; }
.profile-filter-tab:hover::before { transform: scaleX(1); }
.profile-filter-tab.active { background: var(--pink); border-color: var(--pink-dark); color: var(--pink-dark); box-shadow: 0 8px 20px rgb(200 55 106 / 20%); }
.profile-filter-tab.active::before { transform: scaleX(1); background: var(--pink-dark); }
.profile-filter-tab.active .count { background: rgba(0,0,0,0.15); color: #fff; }
.profile-filter-tab .count { min-width: 26px; height: 26px; background: rgba(0,0,0,0.08); color: var(--ink); border-radius: 13px; font-size: 12px; font-weight: 800; text-align: center; line-height: 26px; }

/* History Section */
.profile-history { margin-bottom: 40px; }
.profile-history-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
.profile-history-title { font-family: var(--serif); font-size: 26px; font-weight: 700; margin: 0; color: var(--ink); letter-spacing: -.03em; }

/* Transaction Cards */
.profile-transactions { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 20px; }
.transaction-card { background: var(--white); border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: 0 2px 12px rgb(36 31 39 / 5%); transition: all .35s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; gap: 18px; position: relative; }
.transaction-card:hover { transform: translateY(-5px); box-shadow: 0 20px 44px rgb(36 31 39 / 12%); border-color: var(--pink); }
.transaction-card::after { content: ''; position: absolute; top: 24px; right: 24px; width: 36px; height: 36px; border-radius: 50%; background: #f3e8ed; opacity: 0; transition: opacity .3s ease; }
.transaction-card:hover::after { opacity: 1; }
.transaction-top { display: flex; justify-content: space-between; align-items: flex-start; }
.transaction-title { font-family: var(--serif); font-size: 20px; font-weight: 700; margin: 0 0 6px; color: var(--ink); letter-spacing: -.03em; }
.transaction-invoice { font-family: var(--sans); font-size: 13px; color: var(--muted); margin-bottom: 14px; }
.transaction-invoice strong { color: var(--ink); font-weight: 700; }
.transaction-meta { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px 16px; margin-bottom: 12px; }
.transaction-meta-item { display: flex; flex-direction: column; gap: 5px; }
.transaction-meta-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .09em; color: var(--muted); }
.transaction-meta-value { font-size: 14px; color: var(--ink); font-weight: 500; word-break: break-word; }
.transaction-total { font-family: var(--serif); font-size: 21px; font-weight: 700; color: var(--pink-dark); margin-top: 6px; }

.transaction-bottom { display: flex; justify-content: space-between; align-items: center; margin-top: 8px; padding-top: 14px; border-top: 1px solid #f3e8ed; }
.status-badge { display: inline-flex; align-items: center; gap: 7px; padding: 7px 14px; border-radius: 999px; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; white-space: nowrap; }
.status-badge .dot { width: 7px; height: 7px; border-radius: 50%; }
.status-paid { background: #f0fdf4; color: #15803d; }
.status-pending { background: #fef3c7; color: #b45309; }
.status-failed { background: #fef2f2; color: #dc2626; }
.status-paid .dot { background: #15803d; }
.status-pending .dot { background: #b45309; }
.status-failed .dot { background: #dc2626; }

.transaction-actions-group { display: flex; gap: 10px; flex-wrap: wrap; }
.btn-pay { background: var(--pink); color: #fff; border: none; border-radius: 12px; padding: 12px 20px; font-size: 14px; font-weight: 800; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); white-space: nowrap; box-shadow: 0 6px 16px rgb(200 55 106 / 22%); position: relative; overflow: hidden; }
.btn-pay::before { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,0.15); transform: translateX(-100%); transition: transform .3s ease; }
.btn-pay:hover { background: var(--pink-dark); transform: translateY(-2px); box-shadow: 0 10px 24px rgb(200 55 106 / 30%); }
.btn-pay:hover::before { transform: translateX(100%); }
.btn-pay:disabled { opacity: .65; cursor: not-allowed; transform: none; box-shadow: none; }
.btn-pay:disabled::before { display: none; }
.btn-detail { background: transparent; color: var(--pink-dark); border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-size: 14px; font-weight: 700; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); white-space: nowrap; text-decoration: none; text-align: center; display: inline-block; }
.btn-detail:hover { border-color: var(--pink); background: var(--pink-pale); color: var(--pink-dark); transform: translateY(-1px); }

/* Empty State */
.profile-empty { text-align: center; padding: 72px 32px; background: var(--white); border: 1px solid var(--line); border-radius: 24px; box-shadow: 0 2px 12px rgb(36 31 39 / 5%); }
.profile-empty-icon { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--pink-pale) 0%, var(--rose) 100%); display: grid; place-items: center; margin: 0 auto 24px; color: var(--pink-dark); font-size: 40px; box-shadow: 0 12px 28px rgb(200 55 106 / 15%); animation: floatIcon 4s ease-in-out infinite; }
@keyframes floatIcon { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
.profile-empty h3 { font-family: var(--serif); font-size: 24px; font-weight: 700; margin: 0 0 10px; color: var(--ink); }
.profile-empty p { color: var(--muted); font-size: 16px; margin: 0 0 28px; line-height: 1.7; max-width: 420px; margin-left: auto; margin-right: auto; }

/* Pagination */
.profile-pagination { display: flex; justify-content: center; gap: 8px; margin-top: 24px; }
.profile-pagination a, .profile-pagination span { padding: 10px 16px; border-radius: 10px; border: 1px solid var(--line); background: var(--white); color: var(--ink); font-size: 14px; font-weight: 600; text-decoration: none; min-width: 44px; text-align: center; transition: all .2s ease; }
.profile-pagination a:hover { border-color: var(--pink); color: var(--pink-dark); background: var(--pink-pale); transform: translateY(-1px); }
.profile-pagination .current { background: var(--pink); border-color: var(--pink-dark); color: #fff; box-shadow: 0 6px 16px rgb(200 55 106 / 20%); }

/* Edit Profile Section */
.profile-edit-card { background: var(--white); border: 1px solid var(--line); border-radius: 24px; padding: 32px; box-shadow: 0 4px 20px rgb(36 31 39 / 6%); margin-bottom: 32px; }
.profile-edit-card h2 { font-family: var(--serif); font-size: 24px; font-weight: 700; margin: 0 0 8px; color: var(--ink); }
.profile-edit-card p { color: var(--muted); margin: 0 0 24px; font-size: 15px; }
.edit-form-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
.edit-label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .09em; color: var(--muted); margin-bottom: 8px; display: block; }
.edit-input, .edit-textarea { width: 100%; padding: 14px 18px; border: 1px solid var(--line); border-radius: 14px; background: #fcfafa; font-size: 15px; color: var(--ink); transition: all .2s ease; font-family: inherit; }
.edit-input:focus, .edit-textarea:focus { outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px rgb(200 55 106 / 10%); background: #fff; }
.edit-input[readonly], .edit-textarea[readonly] { background: #f3f4f6; cursor: not-allowed; color: var(--muted); }
.edit-avatar-group { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.edit-avatar-preview { width: 96px; height: 96px; border-radius: 50%; object-fit: cover; border: 4px solid var(--white); box-shadow: 0 8px 24px rgb(36 31 39 / 10%); background: var(--white); }
.edit-avatar-placeholder { width: 96px; height: 96px; border-radius: 50%; background: var(--rose); display: grid; place-items: center; font-family: var(--serif); font-size: 30px; font-weight: 700; color: var(--pink-dark); border: 4px solid var(--white); box-shadow: 0 8px 24px rgb(36 31 39 / 10%); }
.edit-actions { margin-top: 24px; display: flex; gap: 12px; flex-wrap: wrap; }
.btn-save { background: var(--pink); color: #fff; border: none; border-radius: 12px; padding: 14px 32px; font-size: 15px; font-weight: 800; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 6px 16px rgb(200 55 106 / 20%); }
.btn-save:hover { background: var(--pink-dark); transform: translateY(-2px); box-shadow: 0 10px 24px rgb(200 55 106 / 28%); }
.btn-save:disabled { opacity: .7; cursor: not-allowed; transform: none; }
.btn-outline { background: var(--white); color: var(--ink); border: 1px solid var(--line); border-radius: 12px; padding: 14px 24px; font-size: 14px; font-weight: 700; cursor: pointer; transition: all .25s ease; text-decoration: none; text-align: center; display: inline-block; }
.btn-outline:hover { border-color: var(--pink); color: var(--pink-dark); background: var(--pink-pale); transform: translateY(-1px); }

.toggle-edit { background: none; border: 1px solid var(--line); border-radius: 12px; padding: 10px 18px; font-size: 13px; font-weight: 700; color: var(--muted); cursor: pointer; transition: all .2s ease; display: inline-flex; align-items: center; gap: 8px; }
.toggle-edit:hover { border-color: var(--pink); color: var(--pink-dark); background: var(--pink-pale); }
.toggle-edit input { width: 18px; height: 18px; cursor: pointer; accent-color: var(--pink); }

/* Flash Message */
.profile-flash { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 14px 20px; border-radius: 14px; font-size: 14px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px; animation: slideDown .4s ease; }
@keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

/* Responsive */
@media (max-width: 900px) {
    .profile-stats-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .profile-transactions { grid-template-columns: 1fr; }
    .profile-hero-grid { grid-template-columns: 1fr; gap: 24px; }
    .profile-avatar-wrap { width: 100px; height: 100px; margin: 0 auto; }
    .profile-info { text-align: center; }
    .profile-actions { justify-content: center; }
    .profile-meta-item { justify-content: center; }
    .profile-history-header { flex-direction: column; align-items: flex-start; gap: 14px; }
    .transaction-bottom { flex-direction: column; align-items: flex-start; gap: 12px; }
    .transaction-actions-group { width: 100%; }
    .btn-pay, .btn-detail { width: 100%; }
}
@media (max-width: 520px) {
    .profile-stats-grid { grid-template-columns: 1fr; }
    .profile-page { padding: 32px 0; }
    .profile-hero { padding: 28px; }
    .profile-edit-card { padding: 24px; }
    .profile-name { font-size: 28px; }
}
</style>

<!-- Flash -->
@if (session('status'))
    <div class="profile-flash"><span aria-hidden="true">✦</span>{{ session('status') }}</div>
@endif
@if ($errors->any())
    <div style="background:#fef2f2;border:1px solid #fecaca;color:#991b1b;padding:14px 20px;border-radius:14px;margin-bottom:24px;font-size:14px">
        <ul style="margin:0;padding-left:18px">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<!-- Hero / Profile Header -->
<div class="container">
<section class="profile-page">
    <div class="profile-hero">
        <div class="profile-hero-grid">
            <div class="profile-avatar-wrap">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="profile-avatar">
                @else
                    <div class="profile-avatar-placeholder">{{ strtoupper(substr($user->name,0,1)) }}</div>
                @endif
                <button class="profile-avatar-badge" title="Ubah foto" onclick="document.getElementById('avatarInput').click()">📷</button>
                <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display:none" onchange="document.getElementById('avatarForm').submit()">
                <form id="avatarForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="display:none">@csrf</form>
            </div>
            <div class="profile-info">
                <div class="profile-role"><span class="profile-role-dot"></span>Pelanggan Beautycare</div>
                <h1 class="profile-name">{{ $user->name }}</h1>
                <div class="profile-meta">
                    <div class="profile-meta-item"><span class="label">Email</span><span class="value">{{ $user->email }}</span></div>
                    @if ($user->phone)
                        <div class="profile-meta-item"><span class="label">Telepon</span><span class="value">{{ $user->phone }}</span></div>
                    @endif
                    @if ($user->address)
                        <div class="profile-meta-item"><span class="label">Alamat</span><span class="value">{{ $user->address }}</span></div>
                    @endif
                    <div class="profile-meta-item"><span class="label">Bergabung</span><span class="value">{{ $user->created_at->format('d M Y') }}</span></div>
                </div>
                <div class="profile-actions">
                    <form id="editForm" method="POST" action="{{ route('profile.update') }}" style="display:inline">
                        @csrf
                        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
                            <label class="toggle-edit" style="cursor:pointer">
                                <input type="checkbox" name="edit_mode" id="editModeToggle" style="width:auto;height:auto;cursor:pointer" {{ $user->phone || $user->address ? '' : 'checked' }}>
                                <span id="toggleText">Ubah data</span>
                            </label>
                            <button type="submit" class="btn-save" id="saveBtn" {{ ($user->phone || $user->address) && !request('edit_mode') ? 'disabled' : '' }}>Simpan</button>
                        </div>
                    </form>
                    <div id="editFields" style="margin-top:14px; padding-top:14px; border-top:1px solid var(--line); {{ ($user->phone || $user->address) && !request('edit_mode') ? 'display:none' : '' }}">
                        <div class="edit-form-grid">
                            <div>
                                <span class="edit-label">Telepon</span>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="edit-input" placeholder="08xxxxxxxxxx">
                            </div>
                            <div>
                                <span class="edit-label">Alamat</span>
                                <textarea name="address" rows="2" class="edit-input edit-textarea" placeholder="Alamat lengkap Anda">{{ old('address', $user->address ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:10px">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="display:inline">
                        @csrf
                        <input type="file" name="avatar" accept="image/*" style="display:none" onchange="this.form.submit()">
                        <label style="cursor:pointer; display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border:1px solid var(--line); border-radius:12px; background:var(--white); color:var(--pink-dark); font-weight:700; font-size:14px; transition:all .2s ease" onmouseover="this.style.borderColor='var(--pink)';this.style.background='var(--pink-pale)'" onmouseout="this.style.borderColor='var(--line)';this.style.background='var(--white)'">
                            Ganti Foto Profil
                        </label>
                        @if ($user->avatar)
                            <button type="button" style="margin-left:8px; padding:10px 16px; border:1px solid #dc2626; border-radius:12px; background:var(--white); color:#dc2626; font-weight:700; font-size:13px; cursor:pointer" onclick="if(confirm('Yakin hapus foto profil?')){ this.closest('form').querySelector('input[name=remove_avatar]').value='1'; this.closest('form').submit(); }">
                                <input type="hidden" name="remove_avatar" value="0"> Hapus Foto
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <section class="profile-stats">
        <div class="profile-stats-grid">
            <div class="profile-stat-card total">
                <span class="profile-stat-value">{{ $stats['total'] }}</span>
                <span class="profile-stat-label">Total Transaksi</span>
            </div>
            <div class="profile-stat-card paid">
                <span class="profile-stat-value">{{ $stats['paid'] }}</span>
                <span class="profile-stat-label">Pembayaran Berhasil</span>
            </div>
            <div class="profile-stat-card unpaid">
                <span class="profile-stat-value">{{ $stats['unpaid'] }}</span>
                <span class="profile-stat-label">Menunggu Pembayaran</span>
            </div>
            <div class="profile-stat-card failed">
                <span class="profile-stat-value">{{ $stats['failed'] }}</span>
                <span class="profile-stat-label">Gagal / Kadaluarsa</span>
            </div>
        </div>
    </section>

    <!-- History -->
    <section class="profile-history">
        <div class="profile-filters">
            <a href="{{ request()->fullUrlWithQuery(['filter' => 'all']) }}" class="profile-filter-tab {{ $filter === 'all' ? 'active' : '' }}">
                Semua <span class="count">{{ $stats['total'] }}</span>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['filter' => 'unpaid']) }}" class="profile-filter-tab {{ $filter === 'unpaid' ? 'active' : '' }}">
                Belum Dibayar <span class="count">{{ $stats['unpaid'] }}</span>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['filter' => 'paid']) }}" class="profile-filter-tab {{ $filter === 'paid' ? 'active' : '' }}">
                Berhasil <span class="count">{{ $stats['paid'] }}</span>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['filter' => 'failed']) }}" class="profile-filter-tab {{ $filter === 'failed' ? 'active' : '' }}">
                Gagal / Kadaluarsa <span class="count">{{ $stats['failed'] }}</span>
            </a>
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
                    <div class="transaction-card">
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
                                <a href="{{ route('profile.transactions.show', $booking->reference) }}" class="btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="profile-pagination">
                {{ $bookings->links() }}
            </div>
        @endif
    </section>
</section>
</div>

@endsection

@push('scripts')
<script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
(function() {
    // Edit mode toggle
    var toggle = document.getElementById('editModeToggle');
    var fields = document.getElementById('editFields');
    var saveBtn = document.getElementById('saveBtn');
    var toggleText = document.getElementById('toggleText');

    if (toggle && fields) {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                fields.style.display = 'block';
                toggleText.textContent = 'Selesai';
                if (saveBtn) saveBtn.disabled = false;
            } else {
                fields.style.display = 'none';
                toggleText.textContent = 'Ubah data';
                if (saveBtn) saveBtn.disabled = true;
            }
        });
    }

    // Pay buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-pay')) {
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

    // CSRF meta tag
    if (!document.querySelector('meta[name="csrf-token"]')) {
        var meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = '{{ csrf_token() }}';
        document.head.appendChild(meta);
    }
})();
</script>
@endpush