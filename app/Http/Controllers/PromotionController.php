<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\View\View;

class PromotionController extends Controller
{
    public function index(): View
    {
        $activePromotions = Promotion::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($p) => $p->toArray());

        return view('promo', ['activePromotions' => $activePromotions]);
    }

    public function show(string $slug): View
    {
        $activePromotions = Promotion::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($p) => $p->toArray());

        $promotion = $activePromotions->firstWhere('slug', $slug);

        abort_if($promotion === null, 404);

        $relatedPromotions = $activePromotions
            ->reject(fn (array $item) => $item['slug'] === $slug)
            ->values();

        return view('promo-detail', compact('promotion', 'relatedPromotions'));
    }
}
