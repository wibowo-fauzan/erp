<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
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
Route::post('/booking/{reference}/bukti', [BookingController::class, 'uploadPaymentProof'])->name('booking.proof');
Route::view('/faq', 'faq')->name('faq');
Route::view('/wishlist', 'wishlist')->middleware('auth')->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/booking-saya', [MyBookingController::class, 'index'])->name('my-bookings');
    Route::get('/api/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/api/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserLoginController::class, 'create'])->name('login');
    Route::post('/login', [UserLoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/register', [RegistrationController::class, 'create'])->name('register');
    Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
});
