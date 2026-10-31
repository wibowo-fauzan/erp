<?php

namespace App\Filament\Resources\TreatmentAvailabilityResource\Pages;

use App\Filament\Resources\TreatmentAvailabilityResource;
use App\Models\TreatmentAvailability;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTreatmentAvailability extends CreateRecord
{
    protected static string $resource = TreatmentAvailabilityResource::class;

    protected function handleRecordCreation(array $data): TreatmentAvailability
    {
        $data['created_by'] = auth()->id();

        return parent::handleRecordCreation($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
