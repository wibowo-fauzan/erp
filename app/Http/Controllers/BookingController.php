<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Treatment;
use App\Models\TreatmentAvailability;
use App\Services\MidtransService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(Request $request): View|RedirectResponse
    {
        if (auth()->check() && (empty(auth()->user()->phone) || empty(auth()->user()->address))) {
            return redirect()->route('profile')->with('error', 'Lengkapi data profil Anda (telepon & alamat) sebelum booking.');
        }

        $treatments = Treatment::query()->where('is_active', true)->get()->map(fn ($t) => [
            'slug' => $t->slug,
            'filter' => $t->filter,
            'category' => $t->category,
            'title' => $t->name,
            'description' => $t->description,
            'duration' => $t->duration_minutes,
            'price' => $t->price,
            'action' => $t->action,
            'primary' => $t->is_primary,
            'image' => $t->image,
            'alt' => $t->alt,
        ])->all();
        $promotions = config('promotions');
        $selectedTreatment = collect($treatments)->firstWhere('slug', old('treatment_slug', $request->query('treatment')))
            ?? ($treatments[0] ?? null);
        $selectedPromotion = collect($promotions)->firstWhere('slug', old('promotion_slug', $request->query('promo')));
        $minimumDate = now('Asia/Jakarta')->toDateString();
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

        $availableDates = $this->getAvailableDatesInRange($minimumDate, $maximumDate);
        $blockedDates = $this->getBlockedDatesReasons($minimumDate, $maximumDate);

        $user = auth()->user();

        return view('booking', [
            'treatments' => $treatments,
            'availableTimes' => $this->availableTimes($selectedDate),
            'selectedTreatment' => $selectedTreatment,
            'selectedPromotion' => $selectedPromotion,
            'minimumDate' => $minimumDate,
            'maximumDate' => $maximumDate,
            'selectedDate' => $selectedDate,
            'availableDates' => $availableDates,
            'blockedDates' => $blockedDates,
            'userName' => $user?->name ?? '',
            'userEmail' => $user?->email ?? '',
            'userPhone' => $user?->phone ?? '',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if (auth()->check() && (empty(auth()->user()->phone) || empty(auth()->user()->address))) {
            return redirect()->route('profile')->with('error', 'Lengkapi data profil Anda (telepon & alamat) sebelum booking.');
        }

        $treatmentSlugs = Treatment::query()->where('is_active', true)->pluck('slug')->all();
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
                'after_or_equal:'.now('Asia/Jakarta')->toDateString(),
                'before_or_equal:'.now('Asia/Jakarta')->addMonths(2)->toDateString(),
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

        if ($this->isTimeBlocked($validated['booking_date'], $validated['booking_time'])) {
            throw ValidationException::withMessages([
                'booking_time' => 'Waktu yang dipilih tidak tersedia. Silakan pilih jadwal lain.',
            ]);
        }

        $booking = Booking::query()->create([
            'reference' => $this->newReference(),
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'treatment_slug' => $validated['treatment_slug'],
            'promotion_code' => $promotion['code'] ?? null,
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'menunggu_konfirmasi',
            'payment_status' => 'menunggu_verifikasi',
        ]);

        $treatment = Treatment::query()->where('slug', $validated['treatment_slug'])->first();
        $price = $treatment ? (int) preg_replace('/[^0-9]/', '', $treatment->price ?? '') : 0;

        if ($price <= 0) {
            throw ValidationException::withMessages([
                'treatment_slug' => 'Treatment yang dipilih tidak memiliki harga yang valid.',
            ]);
        }

        $midtrans = new MidtransService;
        try {
            $midtransResult = $midtrans->createTransaction([
                'order_id' => $booking->reference,
                'gross_amount' => $price,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]);

            $booking->update([
                'midtrans_order_id' => $booking->reference,
                'midtrans_snap_token' => $midtransResult['snap_token'] ?? null,
                'midtrans_response' => is_array($midtransResult) ? json_encode($midtransResult) : null,
            ]);

            session()->flash('snap_token', $midtransResult['snap_token'] ?? null);
            session()->flash('snap_redirect_url', $midtransResult['redirect_url'] ?? null);
        } catch (\Throwable $e) {
            \Log::error('Midtrans createTransaction failed in store: '.$e->getMessage());
        }

        return redirect()->route('booking.show', $booking->reference);
    }

    public function show(string $reference): View
    {
        $booking = Booking::query()
            ->where('reference', $reference)
            ->firstOrFail();

        $treatment = Treatment::query()->where('slug', $booking->treatment_slug)->first();

        abort_if($treatment === null, 404);

        $snapToken = session('snap_token') ?? $booking->midtrans_snap_token;

        if (empty($snapToken)) {
            $price = $treatment ? (int) preg_replace('/[^0-9]/', '', $treatment->price ?? '') : 0;

            if ($price > 0) {
                try {
                    $midtrans = new MidtransService;
                    $midtransResult = $midtrans->createTransaction([
                        'order_id' => $booking->reference,
                        'gross_amount' => $price,
                        'name' => $booking->name,
                        'email' => $booking->email,
                        'phone' => $booking->phone,
                    ]);

                    $snapToken = $midtransResult['snap_token'] ?? null;

                    $booking->update([
                        'midtrans_order_id' => $booking->reference,
                        'midtrans_snap_token' => $snapToken,
                        'midtrans_response' => is_array($midtransResult) ? json_encode($midtransResult) : null,
                    ]);
                } catch (\Throwable $e) {
                    \Log::error('Midtrans createTransaction failed in show: '.$e->getMessage());
                }
            }
        }

        return view('booking-confirmation', compact('booking', 'treatment', 'snapToken'));
    }

    public function uploadPaymentProof(Request $request, string $reference): RedirectResponse
    {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();

        $validated = $request->validate([
            'payment_proof' => ['required', 'image', 'max:2048'],
        ]);

        $path = $request->file('payment_proof')->store('payment-proofs', 'public');

        $booking->update([
            'payment_proof' => $path,
            'payment_status' => 'menunggu_verifikasi',
        ]);

        return redirect()->route('booking.show', $booking->reference)->with('status', 'Bukti pembayaran berhasil diunggah.');
    }

    private function availableTimes(?string $date = null): array
    {
        $allTimes = ['09:00', '10:30', '12:00', '13:30', '15:00', '16:30', '18:00'];

        if ($date === null) {
            return $allTimes;
        }

        $blockedTimes = $this->getBlockedTimesForDate($date);

        return array_values(array_diff($allTimes, $blockedTimes));
    }

    private function isTimeBlocked(string $date, string $time): bool
    {
        $blockedTimes = $this->getBlockedTimesForDate($date);

        return in_array($time, $blockedTimes, true);
    }

    private function getBlockedTimesForDate(string $date): array
    {
        $parsedDate = Carbon::createFromFormat('!Y-m-d', $date);
        $dayOfWeek = (int) $parsedDate->format('w');

        $allTimes = $this->availableTimes();

        $availabilities = TreatmentAvailability::query()
            ->where('is_active', true)
            ->where(function ($query) use ($date) {
                $query
                    ->where('start_date', '<=', $date)
                    ->where(function ($q) use ($date) {
                        $q->whereNull('end_date')
                            ->orWhere('end_date', '>=', $date);
                    });
            })
            ->get();

        // Tidak ada ketersediaan yang mengatur tanggal ini: semua waktu buka (default).
        if ($availabilities->isEmpty()) {
            return [];
        }

        $availableSlots = [];

        foreach ($availabilities as $availability) {
            // Cek hari untuk recurring
            if ($availability->type === 'recurring') {
                if (! in_array($dayOfWeek, $availability->days_of_week ?? [], true)) {
                    continue;
                }
            }

            // Full day = hari ini tidak tersedia (diblokir sepenuhnya)
            if ($availability->type === 'full_day') {
                return $allTimes;
            }

            // Partial day = hanya waktu dalam rentang yang buka
            if ($availability->start_time && $availability->end_time) {
                $start = Carbon::parse($availability->start_time);
                $end = Carbon::parse($availability->end_time);

                foreach ($allTimes as $slot) {
                    $slotTime = Carbon::createFromFormat('H:i', $slot);
                    if ($slotTime->gte($start) && $slotTime->lt($end)) {
                        $availableSlots[] = $slot;
                    }
                }
            }
        }

        // Blokir semua waktu yang tidak ada dalam slot yang tersedia
        $availableSlots = array_unique($availableSlots);

        if (empty($availableSlots)) {
            return $allTimes;
        }

        return array_values(array_diff($allTimes, $availableSlots));
    }

    private function getAvailableDatesInRange(string $from, string $to): array
    {
        $start = Carbon::createFromFormat('!Y-m-d', $from)->startOfDay();
        $end = Carbon::createFromFormat('!Y-m-d', $to)->startOfDay();

        $availableDates = [];

        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dateString = $date->toDateString();
            if (! empty($this->availableTimes($dateString))) {
                $availableDates[] = $dateString;
            }
        }

        return $availableDates;
    }

    private function getBlockedDatesReasons(string $from, string $to): array
    {
        $start = Carbon::createFromFormat('!Y-m-d', $from)->startOfDay();
        $end = Carbon::createFromFormat('!Y-m-d', $to)->startOfDay();

        $availabilities = TreatmentAvailability::query()
            ->where('is_active', true)
            ->get();

        $blockedDates = [];

        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dateString = $date->toDateString();
            $dayOfWeek = (int) $date->format('w');

            $covering = $availabilities->filter(function ($availability) use ($dateString, $dayOfWeek) {
                $avStart = $availability->start_date instanceof Carbon
                    ? $availability->start_date->toDateString()
                    : (string) $availability->start_date;
                if ($avStart > $dateString) {
                    return false;
                }

                $avEnd = $availability->end_date;
                if ($avEnd !== null) {
                    $avEndStr = $avEnd instanceof Carbon ? $avEnd->toDateString() : (string) $avEnd;
                    if ($avEndStr < $dateString) {
                        return false;
                    }
                }

                if ($availability->type === 'recurring' && ! in_array($dayOfWeek, $availability->days_of_week ?? [], true)) {
                    return false;
                }

                return true;
            });

            if ($covering->isEmpty()) {
                continue;
            }

            // full_day = hari ini tidak tersedia sepenuhnya
            if ($covering->contains(fn ($a) => $a->type === 'full_day')) {
                $record = $covering->first(fn ($a) => $a->type === 'full_day');
                $blockedDates[$dateString] = [
                    'title' => $record->title,
                    'description' => $record->description,
                    'type' => 'full_day',
                    'start_date' => (string) $record->start_date,
                    'end_date' => $record->end_date ? (string) $record->end_date : null,
                    'start_time' => $record->start_time,
                    'end_time' => $record->end_time,
                ];

                continue;
            }

            // partial_day / recurring: diblokir hanya jika tidak ada waktu yang tersedia
            if (empty($this->availableTimes($dateString))) {
                $record = $covering->first();
                $blockedDates[$dateString] = [
                    'title' => $record->title,
                    'description' => $record->description,
                    'type' => $record->type,
                    'start_date' => (string) $record->start_date,
                    'end_date' => $record->end_date ? (string) $record->end_date : null,
                    'start_time' => $record->start_time,
                    'end_time' => $record->end_time,
                ];
            }
        }

        return $blockedDates;
    }

    private function newReference(): string
    {
        do {
            $reference = 'OCTA-'.now('Asia/Jakarta')->format('Ymd').'-'.Str::upper(Str::random(10));
        } while (Booking::query()->where('reference', $reference)->exists());

        return $reference;
    }
}
