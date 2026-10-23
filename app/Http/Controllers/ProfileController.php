<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $bookings = \App\Models\Booking::query()->where('user_id', auth()->id())->latest()->get();
        $treatments = collect(config('treatments'))->keyBy('slug');
        return view('profile', compact('bookings', 'treatments'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'max:10240'],
            'remove_avatar' => ['sometimes', 'boolean'],
        ]);

        $user = auth()->user();

        if ($request->boolean('remove_avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = null;
        } elseif ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } else {
            unset($data['avatar']);
        }

        unset($data['remove_avatar']);
        $user->update($data);

        return redirect()->route('profile')->with('status', 'Profil diperbarui.');
    }
}
