<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\View\View;

class TreatmentController extends Controller
{
    public function index(): View
    {
        $treatments = Treatment::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($t) => [
                'slug' => $t->slug,
                'filter' => $t->filter,
                'category' => $t->category,
                'title' => $t->name,
                'description' => $t->description,
                'duration' => $t->duration_minutes,
                'price' => $t->price,
                'action' => $t->action,
                'primary' => $t->is_primary,
                'image' => $t->image ? (str_starts_with($t->image, 'http') ? $t->image : '/storage/' . $t->image) : null,
                'alt' => $t->alt,
            ]);

        return view('treatment', ['services' => $treatments]);
    }

    public function show(string $slug): View
    {
        $treatment = Treatment::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        abort_if($treatment === null, 404);

        $treatment = [
            'slug' => $treatment->slug,
            'filter' => $treatment->filter,
            'category' => $treatment->category,
            'title' => $treatment->name,
            'description' => $treatment->description,
            'duration' => $treatment->duration_minutes,
            'price' => $treatment->price,
            'product_ids' => $treatment->product_ids,
            'action' => $treatment->action,
            'primary' => $treatment->is_primary,
            'image' => $treatment->image ? (str_starts_with($treatment->image, 'http') ? $treatment->image : '/storage/' . $treatment->image) : null,
            'alt' => $treatment->alt,
            'show_detail_button' => $treatment->show_detail_button,
            'show_booking_button' => $treatment->show_booking_button,
        ];

        $details = config("treatment-details.{$treatment['filter']}", config('treatment-details.default'));

        $relatedTreatments = Treatment::query()
            ->where('is_active', true)
            ->where('slug', '!=', $slug)
            ->orderByRaw('filter = ? DESC', [$treatment['filter']])
            ->take(3)
            ->get()
            ->map(fn ($t) => [
                'slug' => $t->slug,
                'filter' => $t->filter,
                'category' => $t->category,
                'title' => $t->name,
                'description' => $t->description,
                'duration' => $t->duration_minutes,
                'price' => $t->price,
                'action' => $t->action,
                'primary' => $t->is_primary,
                'image' => $t->image ? (str_starts_with($t->image, 'http') ? $t->image : '/storage/' . $t->image) : null,
                'alt' => $t->alt,
            ]);

        return view('treatment-detail', compact('treatment', 'details', 'relatedTreatments'));
    }
}
