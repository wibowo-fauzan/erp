<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FilamentInfoWidget extends Widget
{
    protected function getView(): string
    {
        return 'filament.widgets.filament-info';
    }
}
