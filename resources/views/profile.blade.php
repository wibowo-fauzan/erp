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
.profile-actions { margin-top: 20px; }
.profile-edit-toolbar { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.profile-edit-fields { margin-top: 18px; padding-top: 18px; border-top: 1px solid var(--line); }
.profile-photo-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-top: 16px; }
.profile-photo-button { cursor: pointer; display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border: 1px solid var(--line); border-radius: 12px; background: var(--white); color: var(--pink-dark); font-weight: 700; font-size: 14px; transition: all .2s ease; }
.profile-photo-button:hover { border-color: var(--pink); background: var(--pink-pale); }

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

/* Filter Chips */
.profile-filters { display: flex; gap: 10px; margin-bottom: 24px; flex-wrap: wrap; }
.profile-filter-chip { display: inline-flex; align-items: center; gap: 8px; padding: 11px 18px; border-radius: 14px; border: 1px solid var(--line); background: var(--white); color: var(--muted); font-size: 14px; font-weight: 600; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); white-space: nowrap; position: relative; overflow: hidden; text-decoration: none; }
.profile-filter-chip::before { content: ''; position: absolute; inset: 0; background: var(--pink-pale); transform: scaleX(0); transition: transform .25s ease; transform-origin: left; z-index: 0; }
.profile-filter-chip .chip-icon, .profile-filter-chip .chip-count { position: relative; z-index: 1; }
.profile-filter-chip:hover { border-color: var(--pink); color: var(--pink-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgb(200 55 106 / 12%); }
.profile-filter-chip:hover::before { transform: scaleX(1); background: var(--pink-dark); }
.profile-filter-chip.active {
    background: var(--pink) !important;
    border-color: var(--pink-dark) !important;
    color: #fff !important;
    box-shadow: 0 8px 20px rgb(200 55 106 / 20%);
}
.profile-filter-chip.active::before { transform: scaleX(1); background: var(--pink-dark); }
.profile-filter-chip.active .chip-icon { color: #fff !important; filter: none !important; }
.profile-filter-chip.active .chip-count { background: rgba(255,255,255,0.25) !important; color: #fff !important; }
.profile-filter-chip.active span { color: #fff !important; }
.profile-filter-chip.active .chip-count { min-width: 26px; height: 26px; background: rgba(255,255,255,0.25); color: #fff; border-radius: 13px; font-size: 12px; font-weight: 800; text-align: center; line-height: 26px; }
.profile-filter-chip.loading { pointer-events: none; opacity: 0.6; }
.profile-filter-chip .chip-icon { font-size: 16px; filter: grayscale(0.4); opacity: 0.9; }

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
.btn-pay.loading { color: transparent !important; }
.btn-detail { background: transparent; color: var(--pink-dark); border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; font-size: 14px; font-weight: 700; cursor: pointer; transition: all .25s cubic-bezier(0.4, 0, 0.2, 1); white-space: nowrap; text-decoration: none; text-align: center; display: inline-block; }
.btn-detail:hover { border-color: var(--pink); background: var(--pink-pale); color: var(--pink-dark); transform: translateY(-1px); }
.btn-detail:disabled { opacity: 0.6; cursor: not-allowed; }

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
.edit-form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
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

/* ===== Interactive Components ===== */
.toast-container { position: fixed; top: 20px; right: 20px; z-index: 1000; display: flex; flex-direction: column; gap: 10px; pointer-events: none; }
.toast { pointer-events: auto; display: flex; align-items: center; gap: 12px; padding: 14px 20px; border-radius: 14px; font-size: 14px; font-weight: 600; min-width: 300px; box-shadow: 0 10px 30px rgb(36 31 39 / 12%); animation: slideIn .35s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid transparent; }
.toast.success { background: #f0fdf4; border-color: #bbf7d0; color: #166534; }
.toast.error { background: #fef2f2; border-color: #fecaca; color: #991b1b; }
.toast.info { background: #eff6ff; border-color: #bfdbfe; color: #1e40af; }
.toast .icon { font-size: 18px; flex-shrink: 0; }
@keyframes slideIn { from { opacity: 0; transform: translateX(40px); } to { opacity: 1; transform: translateX(0); } }

.modal { position: fixed; inset: 0; z-index: 1100; display: none; align-items: center; justify-content: center; padding: 24px; }
.modal-open .modal { display: flex; }
.modal-overlay { position: absolute; inset: 0; background: rgb(36 31 39 / 45%); backdrop-filter: blur(4px); animation: fadeIn .25s ease; }
.modal-content { position: relative; background: var(--white); border: 1px solid var(--line); border-radius: 24px; width: min(640px, 92vw); max-height: 90vh; overflow-y: auto; box-shadow: 0 24px 60px rgb(36 31 39 / 18%); animation: scaleIn .3s cubic-bezier(0.4, 0, 0.2, 1); }
.modal-close { position: absolute; top: 16px; right: 16px; width: 36px; height: 36px; border-radius: 50%; border: 1px solid var(--line); background: var(--white); color: var(--ink); font-size: 20px; cursor: pointer; display: grid; place-items: center; line-height: 1; transition: all .2s ease; }
.modal-close:hover { background: var(--pink-pale); color: var(--pink-dark); border-color: var(--pink); }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes scaleIn { from { opacity: 0; transform: scale(0.96); } to { opacity: 1; transform: scale(1); } }

.modal-body { padding: 28px 32px; }
.modal-loading { text-align: center; padding: 40px 24px; color: var(--muted); font-size: 14px; }
.modal-error { text-align: center; padding: 40px 24px; color: #991b1b; font-size: 14px; }

.loading-overlay { position: absolute; inset: 0; background: rgb(255 255 255 / 0.85); border-radius: inherit; display: grid; place-items: center; z-index: 3; animation: fadeIn .2s ease; }
.spinner { width: 32px; height: 32px; border: 3px solid var(--line); border-top-color: var(--pink); border-radius: 50%; animation: spin 0.8s linear infinite; }
@keyframes spin { to { transform: rotate(360deg); } }

.skeleton { background: #f3f4f6; border-radius: 8px; animation: pulse 1.4s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
.skeleton-text { height: 16px; margin-bottom: 8px; }
.skeleton-text:last-child { margin-bottom: 0; }
.skeleton-avatar { width: 48px; height: 48px; border-radius: 50%; }
.skeleton-line { width: 100%; height: 20px; border-radius: 4px; }
@keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.4; } }

.btn-confirm-delete { background: transparent; color: #dc2626; border: 1px solid #fecaca; border-radius: 10px; padding: 8px 14px; font-size: 13px; font-weight: 700; cursor: pointer; }
.btn-confirm-delete:hover { background: #fef2f2; border-color: #dc2626; }

/* Responsive */
@media (max-width: 900px) {
    .profile-stats-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .profile-transactions { grid-template-columns: 1fr; }
    .profile-hero-grid { grid-template-columns: 1fr; gap: 24px; }
    .profile-avatar-wrap { width: 100px; height: 100px; margin: 0 auto; }
    .profile-info { text-align: center; }
    .profile-edit-toolbar { justify-content: center; }
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
    .edit-form-grid { grid-template-columns: 1fr; }
    .toast { min-width: auto; width: 90vw; }
}
</style>

<!-- Toast container -->
<div id="toastContainer" class="toast-container" aria-live="polite" aria-atomic="true"></div>

@if (session('status'))
    <script id="inline-flash" data-type="success" data-message="{{ addslashes(session('status')) }}"></script>
@endif
@if ($errors->any())
    <script id="inline-flash" data-type="error" data-message="Mohon periksa kembali data yang Anda isi.">{{ $errors->first() }}</script>
@endif

<!-- Flash (fallback for non-JS) -->
@if (session('status') && ! request()->ajax())
    <div class="profile-flash"><span aria-hidden="true">✦</span>{{ session('status') }}</div>
@endif
@if ($errors->any() && ! request()->ajax())
    <div style="background:#fef2f2;border:1px solid #fecaca;color:#991b1b;padding:14px 20px;border-radius:14px;margin-bottom:24px;font-size:14px">
        <ul style="margin:0;padding-left:18px">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="container">
<section class="profile-page">
    <!-- Hero / Profile Header -->
    <div class="profile-hero">
        <div class="profile-hero-grid">
            <div class="profile-avatar-wrap">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="profile-avatar" id="avatarPreview">
                @else
                    <div class="profile-avatar-placeholder" id="avatarPlaceholder">{{ strtoupper(substr($user->name,0,1)) }}</div>
                @endif
                <button type="button" class="profile-avatar-badge" title="Ubah foto" onclick="document.getElementById('avatarFileInput').click()">📷</button>
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
                    <form id="editForm" method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="profile-edit-toolbar">
                            <label class="toggle-edit" style="cursor:pointer">
                                <input type="checkbox" name="edit_mode" id="editModeToggle" style="width:auto;height:auto;cursor:pointer" {{ $user->phone || $user->address ? '' : 'checked' }}>
                                <span id="toggleText">Ubah data</span>
                            </label>
                            <button type="submit" class="btn-save" id="saveBtn" {{ ($user->phone || $user->address) && !request('edit_mode') ? 'disabled' : '' }}>Simpan</button>
                        </div>
                        <div id="editFields" class="profile-edit-fields" style="{{ ($user->phone || $user->address) && !request('edit_mode') ? 'display:none' : '' }}">
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
                    </form>
                </div>
                <div class="profile-photo-actions">
                    <form id="avatarUploadForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="avatar" accept="image/*" id="avatarFileInput" style="display:none">
                        <label class="profile-photo-button" for="avatarFileInput">
                            Ganti Foto Profil
                        </label>
                        @if ($user->avatar)
                            <button type="button" class="btn-confirm-delete" onclick="confirmRemoveAvatar(this)">
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
        <div id="transactionsContainer" data-url="{{ route('profile.transactions') }}" data-current-filter="{{ $filter }}">
            @include('profile-transactions-list', ['user' => $user, 'bookings' => $bookings, 'stats' => $stats, 'filter' => $filter])
        </div>
    </section>
</section>
</div>

<!-- Transaction Detail Modal -->
<div id="transactionModal" class="modal" aria-hidden="true" aria-labelledby="modalTitle" role="dialog">
    <div class="modal-overlay" onclick="app.closeTransactionModal()"></div>
    <div class="modal-content">
        <button class="modal-close" onclick="app.closeTransactionModal()" aria-label="Tutup">✕</button>
        <div class="modal-body" id="modalBody">
            <div class="modal-loading"><div class="spinner"></div><div style="margin-top:10px">Memuat detail...</div></div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
(function() {
    'use strict';

    var app = {
        csrfToken: '{{ csrf_token() }}',

        init: function() {
            this.ensureCsrfMeta();
            this.showInlineFlash();
            this.initEditToggle();
            this.initProfileForms();
            this.initFilters();
            this.initPayButtons();
        },

        ensureCsrfMeta: function() {
            if (!document.querySelector('meta[name="csrf-token"]')) {
                var meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = this.csrfToken;
                document.head.appendChild(meta);
            }
        },

        showInlineFlash: function() {
            var el = document.getElementById('inline-flash');
            if (el) {
                this.showToast(el.dataset.message, el.dataset.type);
                el.remove();
            }
        },

        showToast: function(message, type) {
            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast ' + (type || 'info');
            toast.innerHTML = '<span class="icon">' + (type === 'success' ? '✦' : type === 'error' ? '!' : 'ℹ') + '</span><span>' + message + '</span>';
            container.appendChild(toast);
            setTimeout(function() {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(40px)';
                setTimeout(function() { toast.remove(); }, 350);
            }, type === 'error' ? 6000 : 4000);
        },

        api: function(url, method, body) {
            var opts = {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            };
            if (body) opts.body = body;
            return fetch(url, opts).then(function(r) {
                if (!r.ok) return r.json().then(function(err) { throw err; });
                return r.json();
            });
        },

        initEditToggle: function() {
            var toggle = document.getElementById('editModeToggle');
            var fields = document.getElementById('editFields');
            var saveBtn = document.getElementById('saveBtn');
            var toggleText = document.getElementById('toggleText');
            if (!toggle || !fields) return;
            toggle.addEventListener('change', function() {
                if (this.checked) {
                    fields.style.display = 'block';
                    if (toggleText) toggleText.textContent = 'Selesai';
                    if (saveBtn) saveBtn.disabled = false;
                } else {
                    fields.style.display = 'none';
                    if (toggleText) toggleText.textContent = 'Ubah data';
                    if (saveBtn) saveBtn.disabled = true;
                }
            });
        },

        initProfileForms: function() {
            var self = this;

            // Edit phone/address form (AJAX)
            var editForm = document.getElementById('editForm');
            if (editForm) {
                editForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var btn = document.getElementById('saveBtn');

                    var formData = new FormData(editForm);
                    btn.disabled = true;
                    btn.textContent = 'Menyimpan...';

                    self.api(editForm.action, 'POST', formData)
                        .then(function(data) {
                            self.showToast(data.status || 'Profil diperbarui.', 'success');
                            setTimeout(function() { window.location.reload(); }, 600);
                        })
                        .catch(function(err) {
                            var msg = err && err.message ? err.message : 'Gagal menyimpan profil.';
                            self.showToast(msg, 'error');
                            btn.disabled = false;
                            btn.textContent = 'Simpan';
                        });
                });
            }

            // Avatar file input change -> AJAX upload
            var avatarInputs = [document.getElementById('avatarFileInput')];
            var avatarForm = document.getElementById('avatarUploadForm');
            if (avatarForm) {
                avatarInputs.forEach(function(input) {
                    if (!input) return;
                    input.addEventListener('change', function() {
                        if (!this.files.length) return;
                        var formData = new FormData(avatarForm);
                        formData.append('avatar', this.files[0]);
                        var label = avatarForm.querySelector('label[for="avatarFileInput"]');
                        var originalHTML = label ? label.innerHTML : '';
                        if (label) {
                            label.innerHTML = '<div class="spinner" style="width:20px;height:20px"></div>';
                            label.disabled = true;
                        }

                        self.api(avatarForm.action, 'POST', formData)
                            .then(function(data) {
                                self.showToast(data.status || 'Foto profil diperbarui.', 'success');
                                location.reload();
                            })
                            .catch(function(err) {
                                var msg = err && err.message ? err.message : 'Gagal mengupload foto.';
                                self.showToast(msg, 'error');
                                if (label) { label.innerHTML = originalHTML; label.disabled = false; }
                                input.value = '';
                            });
                    });
                });
            }

            // Confirm remove avatar
            window.confirmRemoveAvatar = function(btn) {
                if (!confirm('Yakin ingin menghapus foto profil?')) return;
                var form = btn.closest('form');
                var hidden = form.querySelector('input[name="remove_avatar"]');
                hidden.value = '1';
                var formData = new FormData(form);
                btn.disabled = true;
                btn.textContent = 'Menghapus...';
                self.api(form.action, 'POST', formData)
                    .then(function(data) {
                        self.showToast(data.status || 'Foto profil dihapus.', 'success');
                        location.reload();
                    })
                    .catch(function(err) {
                        var msg = err && err.message ? err.message : 'Gagal menghapus foto.';
                        self.showToast(msg, 'error');
                        btn.disabled = false;
                        btn.textContent = 'Hapus Foto';
                        hidden.value = '0';
                    });
            };
        },

        initFilters: function() {
            var container = document.getElementById('transactionsContainer');
            var self = this;
            if (!container) return;

            // AJAX pagination links inside container (event delegation)
            container.addEventListener('click', function(e) {
                var link = e.target.closest('.profile-pagination a');
                if (!link) return;
                e.preventDefault();
                self.loadTransactions(link.href, null);
            });
        },

        filterTransactions: function(filter, btn) {
            var container = document.getElementById('transactionsContainer');
            var baseUrl = container.dataset.url;
            var url = baseUrl + (baseUrl.indexOf('?') === -1 ? '?' : '&') + 'filter=' + filter;
            var self = this;

            // Visual active state on chips
            document.querySelectorAll('.profile-filter-chip').forEach(function(chip) {
                chip.classList.remove('active');
            });
            btn.classList.add('active');
            btn.classList.add('loading');
            container.style.opacity = '0.5';

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(function(r) { return r.text(); })
            .then(function(html) {
                var temp = document.createElement('div');
                temp.innerHTML = html;
                var newContainer = temp.querySelector('#transactionsContainer');
                if (newContainer) {
                    container.innerHTML = newContainer.innerHTML;
                    container.dataset.currentFilter = newContainer.dataset.currentFilter || filter;
                }
                container.style.opacity = '1';
                btn.classList.remove('loading');
                try { history.pushState(null, '', url); } catch (e) {}
            })
            .catch(function() {
                self.showToast('Gagal memuat riwayat transaksi.', 'error');
                container.style.opacity = '1';
                btn.classList.remove('loading');
            });
        },

        loadTransactions: function(url, activeTab) {
            var container = document.getElementById('transactionsContainer');
            var self = this;

            // Set loading state
            if (activeTab) {
                document.querySelectorAll('.profile-filter-tab').forEach(function(t) { t.classList.remove('active'); });
                activeTab.classList.add('active');
                activeTab.classList.add('loading');
            }
            container.style.opacity = '0.5';

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(function(r) { return r.text(); })
            .then(function(html) {
                var temp = document.createElement('div');
                temp.innerHTML = html;
                var newContainer = temp.querySelector('#transactionsContainer');
                if (newContainer) {
                    container.innerHTML = newContainer.innerHTML;
                    container.dataset.currentFilter = newContainer.dataset.currentFilter || '';
                    // Re-bind pagination (event delegation handles it)
                }
                container.style.opacity = '1';
                if (activeTab) activeTab.classList.remove('loading');
                // Update URL without reload
                try { history.pushState(null, '', url); } catch (e) {}
            })
            .catch(function() {
                self.showToast('Gagal memuat riwayat transaksi.', 'error');
                container.style.opacity = '1';
                if (activeTab) activeTab.classList.remove('loading');
            });
        },

        initPayButtons: function() {
            var self = this;
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-pay')) {
                    e.preventDefault();
                    var btn = e.target;
                    var reference = btn.dataset.reference;
                    btn.disabled = true;
                    btn.classList.add('loading');
                    btn.innerHTML = '<div class="spinner" style="width:18px;height:18px"></div>';

                    self.api('/profil/transaksi/' + encodeURIComponent(reference) + '/bayar', 'POST')
                        .then(function(data) {
                            if (data.error) {
                                app.showToast(data.error, 'error');
                                btn.disabled = false;
                                btn.classList.remove('loading');
                                btn.textContent = 'Bayar Sekarang';
                                return;
                            }
                            var snapToken = data.snap_token;
                            if (typeof snap === 'undefined') {
                                app.showToast('Sistem pembayaran tidak dapat dimuat. Silakan coba lagi nanti.', 'error');
                                btn.disabled = false;
                                btn.classList.remove('loading');
                                btn.textContent = 'Bayar Sekarang';
                                return;
                            }
                            snap.pay(snapToken, {
                                onSuccess: function() { window.location.reload(); },
                                onPending: function() { window.location.reload(); },
                                onError: function() {
                                    app.showToast('Terjadi kesalahan saat memproses pembayaran.', 'error');
                                    btn.disabled = false;
                                    btn.classList.remove('loading');
                                    btn.textContent = 'Bayar Sekarang';
                                }
                            });
                        })
                        .catch(function() {
                            app.showToast('Gagal memuat token pembayaran.', 'error');
                            btn.disabled = false;
                            btn.classList.remove('loading');
                            btn.textContent = 'Bayar Sekarang';
                        });
                }

                if (e.target.classList.contains('btn-view-detail')) {
                    e.preventDefault();
                    var reference = e.target.dataset.reference;
                    app.openTransactionModal(reference);
                }
            });
        },

        openTransactionModal: function(reference) {
            var modal = document.getElementById('transactionModal');
            var body = document.getElementById('modalBody');
            var self = this;
            document.documentElement.classList.add('modal-open');
            body.innerHTML = '<div class="modal-loading"><div class="spinner"></div><div style="margin-top:10px">Memuat detail transaksi...</div></div>';
            modal.style.display = 'flex';

            fetch('/profil/transaksi/' + encodeURIComponent(reference), {
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' }
            })
            .then(function(r) { return r.text(); })
            .then(function(html) {
                var temp = document.createElement('div');
                temp.innerHTML = html;
                var detail = temp.querySelector('.detail-card');
                if (detail) {
                    body.innerHTML = detail.outerHTML;
                    // Re-init pay button inside modal
                    var payBtn = body.querySelector('.btn-pay-detail');
                    if (payBtn) {
                        payBtn.addEventListener('click', function(ev) {
                            ev.preventDefault();
                            var ref = payBtn.dataset.reference;
                            payBtn.disabled = true;
                            payBtn.textContent = 'Memuat...';
                            self.api('/profil/transaksi/' + encodeURIComponent(ref) + '/bayar', 'POST')
                                .then(function(data) {
                                    if (data.error) { app.showToast(data.error, 'error'); payBtn.disabled = false; payBtn.textContent = 'Bayar Sekarang'; return; }
                                    snap.pay(data.snap_token, {
                                        onSuccess: function() { app.closeTransactionModal(); window.location.reload(); },
                                        onPending: function() { app.closeTransactionModal(); window.location.reload(); },
                                        onError: function() { app.showToast('Gagal memproses pembayaran.', 'error'); payBtn.disabled = false; payBtn.textContent = 'Bayar Sekarang'; }
                                    });
                                })
                                .catch(function() { app.showToast('Gagal memuat token pembayaran.', 'error'); payBtn.disabled = false; payBtn.textContent = 'Bayar Sekarang'; });
                        });
                    }
                } else {
                    body.innerHTML = '<div class="modal-error">Detail transaksi tidak tersedia.</div>';
                }
            })
            .catch(function() {
                body.innerHTML = '<div class="modal-error">Gagal memuat detail transaksi.</div>';
            });
        },

        closeTransactionModal: function() {
            var modal = document.getElementById('transactionModal');
            document.documentElement.classList.remove('modal-open');
            modal.style.display = 'none';
            document.getElementById('modalBody').innerHTML = '';
        }
    };

    // Close modal on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') app.closeTransactionModal();
    });

    document.addEventListener('DOMContentLoaded', function() {
        app.init();
    });
})();
</script>
@endpush

@endsection
