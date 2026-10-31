<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class Laporan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Laporan';

    protected static ?string $title = 'Laporan';

    protected static string $view = 'filament.pages.laporan';

    public function mount(): void
    {
        //
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
