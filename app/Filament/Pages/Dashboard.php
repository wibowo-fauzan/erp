<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\User;
use App\Models\Treatment;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverviewWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    protected function getStats(): array
    {
        $today = now()->toDateString();

        return [
            Stat::make('Total Booking', Booking::query()->count())
                ->description('Semua booking')
                ->descriptionIcon('heroicon-m-ticket')
                ->color('primary'),

            Stat::make('Booking Hari Ini', Booking::query()->whereDate('created_at', $today)->count())
                ->description('Booking baru hari ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),

            Stat::make('Menunggu Konfirmasi', Booking::query()->where('status', 'menunggu_konfirmasi')->count())
                ->description('Belum dikonfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Total Pelanggan', User::query()->where('role', 'user')->count())
                ->description('Pelanggan terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Total Treatment', Treatment::query()->count())
                ->description('Treatment tersedia')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('secondary'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
