@php
    $services = [
        [
            'name' => 'Facial Premium',
            'description' => 'Perawatan menyeluruh untuk kulit yang tampak segar dan terawat.',
            'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Perawatan facial profesional',
            'tag' => 'FAVORIT',
        ],
        [
            'name' => 'Acne Care',
            'description' => 'Perhatian lembut untuk kulit yang rentan berjerawat.',
            'image' => 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Produk perawatan kulit',
            'tag' => 'SKIN CONCERN',
        ],
        [
            'name' => 'Hydrating Glow',
            'description' => 'Bantu kulit terasa lembap, nyaman, dan bercahaya.',
            'image' => 'https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Rangkaian skincare untuk hidrasi',
            'tag' => 'GLOW & HYDRATE',
        ],
        [
            'name' => 'Relaxing Massage',
            'description' => 'Waktu relaksasi untuk melepas penat dan merawat diri.',
            'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Suasana spa yang menenangkan',
            'tag' => 'BODY TREATMENT',
        ],
    ];

    $reasons = [
        [
            'title' => 'Terapis berpengalaman',
            'description' => 'Ditangani oleh tim yang mengutamakan kenyamanan dan kebutuhanmu.',
            'symbol' => '✳',
        ],
        [
            'title' => 'Produk pilihan',
            'description' => 'Produk perawatan dipilih dengan perhatian pada kualitas.',
            'symbol' => '♡',
        ],
        [
            'title' => 'Ruang yang nyaman',
            'description' => 'Nikmati suasana tenang untuk jeda dari rutinitas harian.',
            'symbol' => '⌂',
        ],
        [
            'title' => 'Perhatian personal',
            'description' => 'Pengalaman perawatan menyesuaikan kebutuhan setiap pelanggan.',
            'symbol' => '✧',
        ],
    ];

    $promotions = [
        [
            'eyebrow' => 'PAKET PERKENALAN',
            'title' => 'Glow Starter',
            'description' => 'Mulai rutinitas perawatan dengan pilihan favorit.',
            'price' => 'Mulai dari Rp 199.000',
            'image' => 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=800&q=85',
            'alt' => 'Pilihan produk skincare',
            'theme' => 'rose',
        ],
        [
            'eyebrow' => 'MOMEN BERDUA',
            'title' => 'Self-care Duo',
            'description' => 'Nikmati waktu perawatan dan relaksasi bersama.',
            'price' => 'Paket mulai Rp 399.000',
            'image' => 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&fit=crop&w=800&q=85',
            'alt' => 'Ruang relaksasi untuk perawatan tubuh',
            'theme' => 'dark',
        ],
        [
            'eyebrow' => 'PILIHAN BULAN INI',
            'title' => 'Fresh Face Ritual',
            'description' => 'Waktu singkat untuk wajah terasa lebih segar.',
            'price' => 'Lihat paket perawatan',
            'image' => 'https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=800&q=85',
            'alt' => 'Ritual perawatan wajah',
            'theme' => 'rose',
        ],
    ];

    $featuredTreatment = [
        'name' => 'Oeta Royal Gold Facial',
        'description' => 'Ritual facial premium yang memadukan sentuhan relaksasi dan perawatan kulit dalam satu pengalaman istimewa.',
        'image' => 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=90',
        'alt' => 'Perawatan facial premium dengan masker wajah',
        'benefits' => [
            'Dimulai dengan konsultasi singkat',
            'Rangkaian perawatan dengan produk pilihan',
            'Waktu relaksasi untuk dirimu',
        ],
    ];

    $testimonials = [
        [
            'quote' => 'Tempatnya nyaman dan suasananya bikin rileks. Aku suka karena perawatannya terasa personal.',
            'name' => 'Nadia P.',
            'detail' => 'Pelanggan Beauty Care',
            'initial' => 'N',
        ],
        [
            'quote' => 'Terapisnya ramah dan menjelaskan setiap proses dengan baik. Jadi lebih nyaman saat treatment.',
            'name' => 'Alya R.',
            'detail' => 'Pelanggan Beauty Care',
            'initial' => 'A',
        ],
        [
            'quote' => 'Waktu untuk self-care yang selalu aku tunggu. Pulang rasanya lebih segar dan happy.',
            'name' => 'Sinta M.',
            'detail' => 'Pelanggan Beauty Care',
            'initial' => 'S',
        ],
    ];

    $articles = [
        [
            'category' => 'SKINCARE',
            'title' => 'Rutinitas sederhana untuk kulit terasa lebih nyaman',
            'excerpt' => 'Kenali langkah dasar merawat kulit yang bisa dimulai dari rumah.',
            'image' => 'https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Perawatan kulit sederhana di rumah',
        ],
        [
            'category' => 'SELF-CARE',
            'title' => 'Meluangkan waktu untuk diri sendiri bukan hal egois',
            'excerpt' => 'Temukan cara kecil untuk menyisipkan jeda di tengah rutinitas.',
            'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Momen perawatan diri yang menenangkan',
        ],
        [
            'category' => 'BEAUTY TIPS',
            'title' => 'Apa yang perlu disiapkan sebelum facial pertama?',
            'excerpt' => 'Beberapa hal sederhana agar kunjungan pertamamu lebih nyaman.',
            'image' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Persiapan untuk perawatan facial',
        ],
        [
            'category' => 'WELLNESS',
            'title' => 'Ritual relaksasi singkat setelah hari yang panjang',
            'excerpt' => 'Ide sederhana untuk membantu tubuh dan pikiran beristirahat.',
            'image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=700&q=85',
            'alt' => 'Suasana relaksasi dan wellness',
        ],
    ];

    $faqs = [
        [
            'question' => 'Bagaimana cara membuat janji perawatan?',
            'answer' => 'Buat akun atau masuk terlebih dahulu untuk memulai proses pemilihan layanan dan jadwal.',
        ],
        [
            'question' => 'Apakah pilihan perawatan bisa disesuaikan?',
            'answer' => 'Setiap kulit memiliki kebutuhan berbeda. Tim Beauty Care dapat membantu memahami pilihan yang sesuai.',
        ],
        [
            'question' => 'Bagaimana cara menghubungi Beauty Care?',
            'answer' => 'Informasi kontak dan jam operasional akan ditampilkan di sini setelah detail bisnis ditentukan.',
        ],
    ];
@endphp

@extends('layouts.website')

@section('meta_title', 'Oeta Beauty Care | Kulit Sehat, Cantik Setiap Hari')
@section('meta_description', 'Jelajahi perawatan wajah, body treatment, dan momen self-care di Oeta Beauty Care. Pengalaman nyaman dan personal untuk merawat dirimu.')
@section('meta_image', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1200&h=630&q=85')

@section('content')
    @include('home.hero')
    @include('home.services')
    @include('home.benefits')
    @include('home.promotions')
    @include('home.featured-treatment')
    @include('home.testimonials')
    @include('home.articles')
    @include('home.faq')
    @include('home.cta')
@endsection
