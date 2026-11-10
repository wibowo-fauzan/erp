<?php

namespace App\Services;

use App\Models\TreatmentAvailability;
use Carbon\Carbon;

class BookingAvailabilityService
{
    public function availableTimes(?string $date = null): array
    {
        $allTimes = ['09:00', '10:30', '12:00', '13:30', '15:00', '16:30', '18:00'];

        if ($date === null) {
            return $allTimes;
        }

        $blockedTimes = $this->getBlockedTimesForDate($date);

        return array_values(array_diff($allTimes, $blockedTimes));
    }

    public function isTimeBlocked(string $date, string $time): bool
    {
        $blockedTimes = $this->getBlockedTimesForDate($date);

        return in_array($time, $blockedTimes, true);
    }

    public function getAvailableDatesInRange(string $from, string $to): array
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

    public function getBlockedDatesReasons(string $from, string $to): array
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

        if ($availabilities->isEmpty()) {
            return [];
        }

        $availableSlots = [];

        foreach ($availabilities as $availability) {
            if ($availability->type === 'recurring') {
                if (! in_array($dayOfWeek, $availability->days_of_week ?? [], true)) {
                    continue;
                }
            }

            if ($availability->type === 'full_day') {
                return $allTimes;
            }

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

        $availableSlots = array_unique($availableSlots);

        if (empty($availableSlots)) {
            return $allTimes;
        }

        return array_values(array_diff($allTimes, $availableSlots));
    }
}
