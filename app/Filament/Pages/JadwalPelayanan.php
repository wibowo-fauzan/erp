<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class JadwalPelayanan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Jadwal Pelayanan';

    protected static ?string $title = 'Jadwal Pelayanan';

    protected static string $view = 'filament.pages.jadwal-pelayanan';

    public function mount(): void
    {
        //
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
