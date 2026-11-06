<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (InvalidStateException) {
            $googleUser = Socialite::driver('google')->stateless()->user();
        }
        $email = $googleUser->getEmail();

        if (! $email || ! filter_var($email, FILTER_VALIDATE_EMAIL) || ! ($googleUser->user['verified_email'] ?? false)) {
            return redirect()->route('login')->withErrors([
                'google' => 'Google harus memberikan alamat email terverifikasi untuk mendaftar.',
            ]);
        }

        $googleId = (string) $googleUser->getId();

        $user = User::query()
            ->where('google_id', $googleId)
            ->first();

        if (! $user) {
            $user = User::query()->where('email', $email)->first();
        }

        if ($user) {
            if ($user->role !== 'user') {
                return redirect()->route('login')->withErrors([
                    'google' => 'Login Google hanya tersedia untuk akun user. Gunakan login admin untuk masuk ke panel.',
                ]);
            }

            if ($user->google_id && $user->google_id !== $googleId) {
                return redirect()->route('login')->withErrors([
                    'google' => 'Login Google hanya tersedia untuk akun user. Gunakan login admin untuk masuk ke panel.',
                ]);
            }

            $user->google_id = $googleId;
            $user->email_verified_at ??= now();
            $user->save();

            Auth::login($user, remember: true);
            request()->session()->regenerate();

            return redirect()->route('home');
        }

        session()->put('google_register', [
            'google_id' => $googleId,
            'name' => $googleUser->getName() ?: $email,
            'email' => $email,
        ]);

        return redirect()->route('register');
    }
}
