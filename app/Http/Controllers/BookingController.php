<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(Request $request): View
    {
        $treatments = config('treatments');
        $promotions = config('promotions');
        $selectedTreatment = collect($treatments)->firstWhere('slug', old('treatment_slug', $request->query('treatment')))
            ?? $treatments[0];
        $selectedPromotion = collect($promotions)->firstWhere('slug', old('promotion_slug', $request->query('promo')));
        $minimumDate = now('Asia/Jakarta')->addDay()->toDateString();
        $maximumDate = now('Asia/Jakarta')->addMonths(2)->toDateString();
        $selectedDate = old('booking_date', $minimumDate);
        $parsedSelectedDate = is_string($selectedDate) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $selectedDate)
            ? Carbon::createFromFormat('!Y-m-d', $selectedDate)
            : false;

        if ($parsedSelectedDate === false
            || $parsedSelectedDate->format('Y-m-d') !== $selectedDate
            || $selectedDate < $minimumDate
            || $selectedDate > $maximumDate) {
            $selectedDate = $minimumDate;
        }

        return view('booking', [
            'treatments' => $treatments,
            'availableTimes' => $this->availableTimes(),
            'selectedTreatment' => $selectedTreatment,
            'selectedPromotion' => $selectedPromotion,
            'minimumDate' => $minimumDate,
            'maximumDate' => $maximumDate,
            'selectedDate' => $selectedDate,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $treatmentSlugs = collect(config('treatments'))->pluck('slug')->all();
        $promotions = collect(config('promotions'));
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^[0-9+().\-\s]{8,30}$/'],
            'treatment_slug' => ['required', 'string', Rule::in($treatmentSlugs)],
            'promotion_slug' => ['nullable', 'string', Rule::in($promotions->pluck('slug')->all())],
            'booking_date' => [
                'required',
                'date',
                'after:' . now('Asia/Jakarta')->toDateString(),
                'before_or_equal:' . now('Asia/Jakarta')->addMonths(2)->toDateString(),
            ],
            'booking_time' => ['required', 'string', Rule::in($this->availableTimes())],
            'notes' => ['nullable', 'string', 'max:1000'],
            'terms' => ['accepted'],
        ]);

        $promotion = $promotions->firstWhere('slug', $validated['promotion_slug'] ?? null);

        if ($promotion !== null && $promotion['treatment_slug'] !== $validated['treatment_slug']) {
            throw ValidationException::withMessages([
                'promotion_slug' => 'Promo ini tidak berlaku untuk treatment yang dipilih.',
            ]);
        }

        $booking = Booking::query()->create([
            'reference' => $this->newReference(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'treatment_slug' => $validated['treatment_slug'],
            'promotion_code' => $promotion['code'] ?? null,
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('booking.show', $booking->reference);
    }

    public function show(string $reference): View
    {
        $booking = Booking::query()
            ->where('reference', $reference)
            ->firstOrFail();

        $treatment = collect(config('treatments'))->firstWhere('slug', $booking->treatment_slug);

        abort_if($treatment === null, 404);

        return view('booking-confirmation', compact('booking', 'treatment'));
    }

    private function availableTimes(): array
    {
        return ['09:00', '10:30', '12:00', '13:30', '15:00', '16:30', '18:00'];
    }

    private function newReference(): string
    {
        do {
            $reference = 'OCTA-' . now('Asia/Jakarta')->format('Ymd') . '-' . Str::upper(Str::random(10));
        } while (Booking::query()->where('reference', $reference)->exists());

        return $reference;
    }
}
