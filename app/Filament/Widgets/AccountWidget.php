<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\AccountWidget as BaseAccountWidget;

class AccountWidget extends BaseAccountWidget
{
    protected function getUser(): ?User
    {
        return auth()->user();
    }
}
