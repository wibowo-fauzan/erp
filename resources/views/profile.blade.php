@extends('layouts.website')

@section('content')
<style>
.profile-card{max-width:720px}
.profile-card h1{font-family:'Playfair Display',serif;margin-bottom:8px}
.profile-card p.meta{margin:4px 0 20px;color:#555}
.profile-card label{display:block;font-size:13px;font-weight:600;margin-bottom:4px;color:#374151}
.profile-card input, .profile-card textarea{width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;background:#fff;font-size:14px}
.profile-card input:focus, .profile-card textarea:focus{border-color:#c084fc;outline:none;box-shadow:0 0 0 3px rgba(192,132,252,0.2)}
.profile-card input[readonly]{background:#f3f4f6;cursor:not-allowed}
.profile-card .avatar{width:120px;height:120px;border-radius:100%;object-fit:cover;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,0.1)}
.profile-card .avatar-placeholder{width:120px;height:120px;border-radius:100%;background:#e5e7eb;display:flex;align-items:center;justify-content:center;font-size:36px;font-weight:700;color:#6b7280;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,0.1)}
.profile-card table{width:100%;border-collapse:collapse;margin-top:8px}
.profile-card th,.profile-card td{text-align:left;padding:12px;border-bottom:1px solid #f3f4f4;font-size:14px}
.profile-card .button{display:inline-block;padding:10px 16px;border:none;border-radius:8px;background:#c084fc;color:#fff;font-size:14px;cursor:pointer;text-decoration:none}
.profile-card .button:hover{background:#a78bfa}
.profile-card .note{color:#16a34a;font-size:14px;margin-top:12px}
.profile-card .crop-row{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.profile-card .avatar-wrap{position:relative;display:inline-block}
.profile-card .avatar-remove{position:absolute;top:-6px;right:-6px;background:#ef4444;color:#fff;border-radius:50%;width:20px;height:20px;display:flex;align-items:center;justify-content:center;font-size:12px;cursor:pointer;box-shadow:0 1px 3px rgba(0,0,0,0.3)}
</style>
<section class="container profile-card" style="padding:48px 0">
    <h1>Dashboard User</h1>
    <p class="meta">Nama: {{ auth()->user()->name }} · Email: {{ auth()->user()->email }}</p>

    @if (session('status'))
        <p class="note">{{ session('status') }}</p>
    @endif
    @if ($errors->any())
        <div style="color:#dc2626;margin-bottom:12px">
            <ul style="margin:0;padding-left:20px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm" style="margin:24px 0">
        @csrf
        <div style="margin-bottom:16px">
            <label>Foto Profil</label>
            <div style="display:flex;align-items:center;gap:12px">
                @if (auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" class="avatar">
                    <button type="button" class="avatar-remove" onclick="removeAvatar()">×</button>
                @else
                    <div class="avatar-placeholder">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                @endif
                <input type="file" name="avatar" id="avatarInput" accept="image/*" style="padding:10px;border:1px solid #d1d5db;border-radius:8px;background:#fff">
            </div>
            <p style="font-size:12px;color:#6b7280;margin-top:6px">Pilih foto profil, lalu klik Simpan Perubahan.</p>
        </div>

        <div style="margin-bottom:16px">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" readonly style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;background:#f3f4f6">
        </div>
        <div style="margin-bottom:16px">
            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" readonly style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;background:#f3f4f6">
        </div>
        <div style="margin-bottom:16px">
            <label>Telepon</label>
            <input type="text" name="phone" value="{{ auth()->user()->phone ?? old('phone') }}" {{ auth()->user()->phone ? 'readonly' : '' }} style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;{{ auth()->user()->phone ? 'background:#f3f4f6' : '' }}">
        </div>
        <div style="margin-bottom:16px">
            <label>Alamat</label>
            <textarea name="address" {{ auth()->user()->address ? 'readonly' : '' }} style="width:100%;padding:10px 12px;border:1px solid #d1d5db;border-radius:8px;{{ auth()->user()->address ? 'background:#f3f4f6' : '' }}">{{ auth()->user()->address ?? old('address') }}</textarea>
        </div>
        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
</section>
@endsection