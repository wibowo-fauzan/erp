<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fdeff5">
    <meta name="description" content="Masuk ke akun Octa Beauty Care untuk menikmati pengalaman perawatan kulit yang lebih personal.">
    <meta name="robots" content="noindex,follow">
    <title>Masuk - Octa Beauty Care</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/beautycare-auth.css') }}">
</head>
<body class="auth-body">
    @include('partials.auth-decor')

    <main class="auth-page">
        <div class="auth-card">
            <h1 class="auth-title">Selamat datang kembali</h1>
            <p class="auth-lead">Masuk ke akun Beauty Care kamu.</p>

            @if ($errors->has('google'))
                <div class="auth-alert" role="alert">{{ $errors->first('google') }}</div>
            @endif

            <form class="auth-form" method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="auth-field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        class="auth-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required
                        autofocus
                    >
                    @error('email')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field password-field">
                    <label for="password">Kata sandi</label>
                    <input
                        id="password"
                        class="auth-input"
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                        required
                    >
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Tampilkan atau sembunyikan kata sandi">👁</button>
                    @error('password')
                        <p class="auth-error">{{ $message }}</p>
                    @enderror
                </div>

                <label class="auth-check">
                    <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>

                <button class="auth-submit" type="submit">Masuk</button>
            </form>

            <p class="auth-divider">atau</p>

            <a class="auth-google" href="{{ route('auth.google.redirect') }}">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="#4285F4" d="M23.5 12.3c0-.9-.1-1.5-.2-2.2H12v4.1h6.5c-.1 1.1-.8 2.7-2.4 3.8v3.1h3.9c2.3-2.1 3.5-5.2 3.5-8.8Z"/>
                    <path fill="#34A853" d="M12 24c3.2 0 5.9-1.1 7.9-2.9l-3.9-3.1c-1 .7-2.4 1.2-4 1.2-3.2 0-5.8-2.1-6.7-5H1.3v3.2C3.3 21.4 7.3 24 12 24Z"/>
                    <path fill="#FBBC05" d="M5.3 14.2c-.2-.7-.4-1.5-.4-2.2s.1-1.5.4-2.2V6.6H1.3C.5 8.2 0 10 0 12s.5 3.8 1.3 5.4l4-3.2Z"/>
                    <path fill="#EA4335" d="M12 4.8c1.8 0 3.3.6 4.5 1.7l3.4-3.4C17.9 1.2 15.2 0 12 0 7.3 0 3.3 2.6 1.3 6.6l4 3.2c.9-2.9 3.5-5 6.7-5Z"/>
                </svg>
                Lanjutkan dengan Google
            </a>

            <p class="auth-alt">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
            <p class="auth-owner"><a href="{{ url('/admin/login') }}">Masuk sebagai owner atau admin</a></p>
        </div>
    </main>
    <style>
        .password-field{position:relative}
        .auth-input{padding-right:40px}
        .password-toggle{position:absolute;right:20px;top:68%;transform:translateY(-50%);background:white;border-radius:100px;cursor:pointer;display:flex;align-items:center;justify-content:center;width:28px;height:28px;padding:0;color:#64748b;font-size:22px;line-height:1}
        .hidden{display:none}
    </style>
    <script>
        const toggle = document.getElementById('passwordToggle');
        const input = document.getElementById('password');
        let shown = false;
        toggle.addEventListener('click', () => {
            shown = !shown;
            input.type = shown ? 'text' : 'password';
            toggle.textContent = shown ? '🙈' : '👁';
        });
    </script>
</body>
</html>
