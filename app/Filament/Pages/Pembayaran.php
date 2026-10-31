<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class Pembayaran extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Pembayaran';

    protected static ?string $title = 'Verifikasi Pembayaran';

    protected static string $view = 'filament.pages.pembayaran';

    public function mount(): void
    {
        //
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
