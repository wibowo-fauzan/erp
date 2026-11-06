<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use App\Services\BookingNotificationService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        $booking = $this->getRecord();
        $oldStatus = $this->getOldRecordData()['status'] ?? null;
        $oldPaymentStatus = $this->getOldRecordData()['payment_status'] ?? null;

        $notificationService = app(BookingNotificationService::class);

        if ($oldStatus !== $booking->status) {
            $notificationService->sendBookingStatusUpdate($booking, $booking->status);
        }

        if ($oldPaymentStatus !== $booking->payment_status) {
            if ($booking->payment_status === 'dikonfirmasi') {
                $notificationService->sendPaymentVerified($booking);
            } elseif ($booking->payment_status === 'ditolak') {
                $notificationService->sendPaymentRejected($booking);
            }
        }
    }
}
