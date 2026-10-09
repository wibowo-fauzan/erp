<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - Beauty Care</title>
    <style>
        :root { font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: #171717; background: #fff; }
        * { box-sizing: border-box; }
        body { margin: 0; }
        .auth { display: grid; min-height: 100vh; grid-template-columns: minmax(0, 1.08fr) minmax(420px, .92fr); }
        .intro { position: relative; display: flex; min-height: 100vh; flex-direction: column; justify-content: center; overflow: hidden; padding: clamp(40px, 8vw, 120px); background: radial-gradient(ellipse at 15% 10%, rgb(138 126 255 / 38%), transparent 38%), linear-gradient(145deg, #4338ca, #211c80); color: #fff; }
        .intro::before, .intro::after { position: absolute; width: 760px; height: 760px; border: 1px solid rgb(255 255 255 / 12%); border-radius: 50%; content: ""; }
        .intro::before { top: 10%; left: -420px; }
        .intro::after { top: 18%; left: -350px; width: 620px; height: 620px; }
        .brand { position: absolute; top: 40px; left: clamp(40px, 8vw, 120px); display: flex; align-items: center; gap: 12px; font-size: 18px; font-weight: 700; }
        .brand-mark { display: grid; width: 42px; height: 42px; place-items: center; border: 1px solid rgb(255 255 255 / 58%); border-radius: 15px; font-size: 24px; }
        .intro-copy { position: relative; z-index: 1; max-width: 580px; }
        .eyebrow { margin: 0 0 20px; color: rgb(255 255 255 / 78%); font-size: 13px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; }
        .intro h1 { margin: 0; font-size: clamp(42px, 5.2vw, 72px); letter-spacing: -.055em; line-height: 1.08; }
        .intro-copy > p:last-child { max-width: 455px; margin-top: 24px; color: rgb(255 255 255 / 82%); font-size: 17px; line-height: 1.7; }
        .footer { position: absolute; bottom: 32px; left: clamp(40px, 8vw, 120px); color: rgb(255 255 255 / 62%); font-size: 13px; }
        .panel { display: flex; min-height: 100vh; align-items: center; justify-content: center; padding: 48px clamp(28px, 7vw, 96px); }
        .content { width: min(100%, 420px); }
        .mobile-brand { display: none; margin-bottom: 38px; color: #211c80; font-size: 19px; font-weight: 750; }
        h2 { margin: 0; font-size: 32px; letter-spacing: -.035em; }
        .lead { margin: 10px 0 28px; color: #737373; font-size: 14px; line-height: 1.6; }
        label { display: block; margin: 16px 0 7px; color: #404040; font-size: 13px; font-weight: 600; }
        input { width: 100%; min-height: 48px; padding: 0 13px; border: 1px solid #e5e5e5; border-radius: 9px; font: inherit; }
        input:focus { outline: 3px solid rgb(99 102 241 / 14%); border-color: #818cf8; }
        .error { margin: 7px 0 0; color: #dc2626; font-size: 12px; }
        .remember { display: flex; align-items: center; gap: 9px; margin-top: 17px; color: #525252; font-size: 13px; }
        .remember input { width: 16px; min-height: 16px; accent-color: #4338ca; }
        button { width: 100%; min-height: 50px; margin-top: 22px; border: 0; border-radius: 9px; background: #171717; color: white; font: inherit; font-weight: 650; cursor: pointer; }
        .divider { display: flex; align-items: center; gap: 14px; margin: 22px 0; color: #a3a3a3; font-size: 12px; }
        .divider::before, .divider::after { height: 1px; flex: 1; background: #e5e5e5; content: ""; }
        .google { display: flex; min-height: 50px; align-items: center; justify-content: center; gap: 10px; border: 1px solid #dedede; border-radius: 9px; color: #262626; font-size: 14px; font-weight: 650; text-decoration: none; }
        .google:hover { background: #fafafa; }
        .google-mark { color: #4285f4; font-size: 19px; font-weight: 800; }
        .signup { margin: 24px 0 0; color: #737373; font-size: 13px; text-align: center; }
        a { color: #4338ca; font-weight: 700; text-decoration: none; }
        a:hover { text-decoration: underline; }
        @media (max-width: 800px) { .auth { grid-template-columns: 1fr; } .intro { display: none; } .panel { min-height: 100vh; padding: 40px 24px; } .mobile-brand { display: block; } }
    </style>
</head>
<body>
<main class="auth">
    <section class="intro" aria-label="Beauty Care">
        <div class="brand"><span class="brand-mark" aria-hidden="true">✦</span><span>Beauty Care</span></div>
        <div class="intro-copy">
            <p class="eyebrow">Ruang cantikmu dimulai di sini</p>
            <h1>Rawat diri.<br>Berbagi percaya diri.</h1>
            <p>Masuk ke Beauty Care untuk mengelola akun dan menikmati pengalaman perawatan yang lebih personal.</p>
        </div>
        <div class="footer">© {{ now()->year }} Beauty Care</div>
    </section>
    <section class="panel">
        <div class="content">
            <div class="mobile-brand">✦ &nbsp; Beauty Care</div>
            <h2>Selamat datang kembali</h2>
            <p class="lead">Masuk ke akun Beauty Care kamu.</p>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                @error('email') <p class="error">{{ $message }}</p> @enderror

                <label for="password">Kata sandi</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password') <p class="error">{{ $message }}</p> @enderror

                <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
                <button type="submit">Masuk</button>
            </form>

            @if (session('errors')?->has('google'))
                <p class="error" role="alert">{{ session('errors')->first('google') }}</p>
            @endif

            <div class="divider">atau</div>
            <a class="google" href="{{ route('auth.google.redirect') }}"><span class="google-mark" aria-hidden="true">G</span> Lanjutkan dengan Google</a>
            <p class="signup">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
            <p class="signup"><a href="{{ url('/admin/login') }}">Masuk sebagai owner atau admin</a></p>
        </div>
    </section>
</main>
</body>
</html>
