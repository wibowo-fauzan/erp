<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Treatment;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Treatment::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($t) => [
                'name' => $t->name,
                'description' => $t->description,
                'image' => $t->image ?: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=700&q=85',
                'alt' => $t->alt ?: $t->name,
            ]);

        $promotions = Promotion::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($p) => [
                'flag' => $p->eyebrow ?: 'Promo',
                'title' => $p->name,
                'description' => $p->description,
                'price' => $p->discount ?: 'Lihat Detail',
                'action' => 'Lihat Promo',
                'image' => $p->image ?: 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=800&q=85',
                'alt' => $p->alt ?: $p->name,
            ]);

        return view('beranda', compact('services', 'promotions'));
    }
}
