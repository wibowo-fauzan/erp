<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();

        if (! $email || ! filter_var($email, FILTER_VALIDATE_EMAIL) || ! ($googleUser->user['verified_email'] ?? false)) {
            return redirect('/admin/login')->withErrors([
                'google' => 'Google harus memberikan alamat email terverifikasi untuk mendaftar.',
            ]);
        }

        $user = DB::transaction(function () use ($googleUser, $email): User {
            $user = User::query()
                ->where('google_id', $googleUser->getId())
                ->first();

            if (! $user) {
                $user = User::query()->where('email', $email)->first();
            }

            if ($user) {
                if ($user->google_id && $user->google_id !== (string) $googleUser->getId()) {
                    abort(403, 'Akun ini sudah terhubung ke akun Google lain.');
                }

                $user->google_id = (string) $googleUser->getId();
                $user->email_verified_at ??= now();
                $user->save();

                return $user;
            }

            return User::query()->create([
                'name' => $googleUser->getName() ?: $email,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Str::random(48),
                'google_id' => (string) $googleUser->getId(),
                'role' => 'user',
            ]);
        });

        Auth::login($user, remember: true);
        request()->session()->regenerate();

        return redirect()->intended(route('home'));
    }
}
