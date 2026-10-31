<?php

namespace App\Filament\Resources\TreatmentAvailabilityResource\Pages;

use App\Filament\Resources\TreatmentAvailabilityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTreatmentAvailability extends EditRecord
{
    protected static string $resource = TreatmentAvailabilityResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
