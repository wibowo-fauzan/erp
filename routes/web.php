<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\WishlistController;
use App\Models\Booking;
use App\Models\Treatment;
use App\Models\Wishlist;
use App\Services\BookingNotificationService;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/tentang-kami', 'about')->name('about');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/faq', 'faq')->name('faq');

Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment');
Route::get('/treatment/{slug}', [TreatmentController::class, 'show'])->name('treatment.show');

Route::get('/promo', [PromotionController::class, 'index'])->name('promo');
Route::get('/promo/{slug}', [PromotionController::class, 'show'])->name('promo.show');

Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->middleware('throttle:10,1')->name('booking.store');
Route::get('/booking/{reference}', [BookingController::class, 'show'])->name('booking.show');
Route::post('/booking/{reference}/bukti', [BookingController::class, 'uploadPaymentProof'])->name('booking.proof');
Route::post('/midtrans/webhook', [MidtransWebhookController::class, 'handle'])->name('midtrans.webhook');

Route::get('/wishlist', function () {
    $treatments = Treatment::query()->where('is_active', true)->get()->map(fn ($t) => [
        'slug' => $t->slug,
        'filter' => $t->filter,
        'category' => $t->category,
        'title' => $t->name,
        'description' => $t->description,
        'duration' => $t->duration_minutes,
        'price' => $t->price,
        'action' => $t->action,
        'primary' => $t->is_primary,
        'image' => $t->image,
        'alt' => $t->alt,
    ]);
    $wishlistSlugs = Wishlist::query()->where('user_id', auth()->id())->pluck('treatment_slug');

    return view('wishlist', ['services' => $treatments, 'wishlistSlugs' => $wishlistSlugs]);
})->middleware('auth')->name('wishlist');

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

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/pembayaran/{reference}/verifikasi', function (string $reference) {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();
        $oldStatus = $booking->payment_status;
        $booking->update([
            'payment_status' => 'dikonfirmasi',
            'verified_at' => now(),
        ]);
        if ($oldStatus !== $booking->payment_status) {
            app(BookingNotificationService::class)->sendPaymentVerified($booking);
        }

        return redirect()->route('filament.admin.pages.pembayaran')->with('success', 'Pembayaran berhasil diverifikasi.');
    })->name('pembayaran.verifikasi');

    Route::post('/pembayaran/{reference}/tolak', function (string $reference) {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();
        $oldStatus = $booking->payment_status;
        $booking->update([
            'payment_status' => 'ditolak',
            'verified_at' => now(),
        ]);
        if ($oldStatus !== $booking->payment_status) {
            app(BookingNotificationService::class)->sendPaymentRejected($booking);
        }

        return redirect()->route('filament.admin.pages.pembayaran')->with('success', 'Pembayaran ditolak.');
    })->name('pembayaran.tolak');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserLoginController::class, 'create'])->name('login');
    Route::post('/login', [UserLoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/register', [RegistrationController::class, 'create'])->name('register');
    Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
});
