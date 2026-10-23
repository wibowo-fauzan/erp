<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('home');

Route::view('/tentang-kami', 'about')->name('about');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/treatment', 'treatment')->name('treatment');
Route::get('/treatment/{slug}', function (string $slug) {
    $treatments = collect(config('treatments'));
    $treatment = $treatments->firstWhere('slug', $slug);

    abort_if($treatment === null, 404);

    $details = config("treatment-details.{$treatment['filter']}", config('treatment-details.default'));
    $relatedTreatments = $treatments
        ->reject(fn (array $item) => $item['slug'] === $slug)
        ->sortBy(fn (array $item) => $item['filter'] === $treatment['filter'] ? 0 : 1)
        ->take(3)
        ->values();

    return view('treatment-detail', compact('treatment', 'details', 'relatedTreatments'));
})->name('treatment.show');
Route::get('/promo', function () {
    return view('promo', ['activePromotions' => config('promotions')]);
})->name('promo');
Route::get('/promo/{slug}', function (string $slug) {
    $promotions = collect(config('promotions'));
    $promotion = $promotions->firstWhere('slug', $slug);

    abort_if($promotion === null, 404);

    $relatedPromotions = $promotions
        ->reject(fn (array $item) => $item['slug'] === $slug)
        ->values();

    return view('promo-detail', compact('promotion', 'relatedPromotions'));
})->name('promo.show');
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->middleware('throttle:10,1')->name('booking.store');
Route::get('/booking/{reference}', [BookingController::class, 'show'])->where('reference', 'OCTA-[0-9]{8}-[A-Z0-9]{10}')->name('booking.show');
Route::view('/faq', 'faq')->name('faq');
Route::view('/wishlist', 'wishlist')->name('wishlist');

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserLoginController::class, 'create'])->name('login');
    Route::post('/login', [UserLoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/register', [RegistrationController::class, 'create'])->name('register');
    Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
});
