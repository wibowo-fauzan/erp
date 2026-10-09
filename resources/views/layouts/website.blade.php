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

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    @stack('scripts')
</body>
</html>
