<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $slugs = Wishlist::query()->where('user_id', auth()->id())->pluck('treatment_slug');
        return response()->json(['slugs' => $slugs]);
    }

    public function toggle(Request $request): JsonResponse
    {
        $validated = $request->validate(['slug' => ['required', 'string']]);
        $slug = $validated['slug'];

        $existing = Wishlist::query()->where('user_id', auth()->id())->where('treatment_slug', $slug)->first();
        if ($existing) {
            $existing->delete();
            return response()->json(['added' => false]);
        }

        Wishlist::query()->create(['user_id' => auth()->id(), 'treatment_slug' => $slug]);
        return response()->json(['added' => true]);
    }
}
