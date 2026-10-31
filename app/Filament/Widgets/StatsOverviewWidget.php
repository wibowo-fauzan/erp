<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\User;
use App\Models\Treatment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $today = now()->toDateString();

        return [
            Stat::make('Total Booking', Booking::query()->count())
                ->description('Semua booking')
                ->descriptionIcon('heroicon-m-ticket')
                ->color('primary'),

            Stat::make('Booking Hari Ini', Booking::query()->whereDate('created_at', $today)->count())
                ->description('Booking yang dibuat hari ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),

            Stat::make('Menunggu Konfirmasi', Booking::query()->where('status', 'menunggu_konfirmasi')->count())
                ->description('Booking yang belum dikonfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Total Pelanggan', User::query()->where('role', 'user')->count())
                ->description('Pelanggan terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Total Treatment', Treatment::query()->count())
                ->description('Treatment yang tersedia')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('secondary'),
        ];
    }
}
