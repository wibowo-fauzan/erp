<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        $google = session('google_register');

        return view('auth.register', [
            'google_register' => $google,
            'google_name' => $google['name'] ?? null,
            'google_email' => $google['email'] ?? null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $google = session('google_register');

        if ($google) {
            $validated = $request->validate([
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);

            $user = User::query()->create([
                'name' => $google['name'],
                'email' => $google['email'],
                'password' => $validated['password'],
                'email_verified_at' => now(),
                'google_id' => $google['google_id'],
                'role' => 'user',
            ]);

            session()->forget('google_register');

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::query()->create([
            ...$validated,
            'role' => 'user',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }
}
