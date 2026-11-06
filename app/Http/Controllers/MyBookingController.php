<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Treatment;
use Illuminate\View\View;

class MyBookingController extends Controller
{
    public function index(): View
    {
        $bookings = Booking::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $treatments = Treatment::query()->where('is_active', true)->get()->keyBy('slug');

        return view('my-bookings', compact('bookings', 'treatments'));
    }
}
