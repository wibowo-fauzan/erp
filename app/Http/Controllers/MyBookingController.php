<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\View\View;

class MyBookingController extends Controller
{
    public function index(): View
    {
        $bookings = Booking::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $treatments = collect(config('treatments'))->keyBy('slug');

        return view('my-bookings', compact('bookings', 'treatments'));
    }
}
