<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.seo')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/beautycare-home.css') }}">
    @stack('head')
</head>
<body>
    @include('partials.navbar')

    @auth
        @if (empty(auth()->user()->phone) || empty(auth()->user()->address))
            <div style="background:#fef3c7;padding:10px 16px;text-align:center;font-size:14px">
                Lengkapi data profil Anda (telepon & alamat) sebelum booking.
                <a href="{{ route('profile') }}" style="color:#16a34a;text-decoration:underline">Lengkapi sekarang</a>
            </div>
        @endif
    @endauth

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    @stack('scripts')
</body>
</html>
