<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class FilamentInfoWidget extends Widget
{
    protected static string $view = 'filament.widgets.filament-info';

    protected function getView(): string
    {
        return 'filament.widgets.filament-info';
    }
}
