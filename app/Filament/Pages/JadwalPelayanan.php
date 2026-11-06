<?php

namespace App\Filament\Pages;

use App\Models\TreatmentAvailability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class JadwalPelayanan extends Page
{
    protected static ?string $navigationGroup = 'Jadwal';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Jadwal Pelayanan';

    protected static ?string $title = 'Jadwal Pelayanan';

    protected static string $view = 'filament.pages.jadwal-pelayanan';

    public static function canView(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'owner'], true);
    }

    public function mount(): void
    {
        //
    }

    protected function getViewData(): array
    {
        $availabilities = TreatmentAvailability::query()
            ->latest()
            ->get();

        return [
            'availabilities' => $availabilities,
        ];
    }
}
