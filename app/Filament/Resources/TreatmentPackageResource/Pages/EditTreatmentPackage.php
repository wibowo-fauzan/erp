<?php

namespace App\Filament\Resources\TreatmentPackageResource\Pages;

use App\Filament\Resources\TreatmentPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTreatmentPackage extends EditRecord
{
    protected static string $resource = TreatmentPackageResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
