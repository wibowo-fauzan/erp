<?php

namespace App\Filament\Resources\TreatmentAvailabilityResource\Pages;

use App\Filament\Resources\TreatmentAvailabilityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTreatmentAvailabilities extends ListRecords
{
    protected static string $resource = TreatmentAvailabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
