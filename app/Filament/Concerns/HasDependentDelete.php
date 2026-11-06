<?php

namespace App\Filament\Concerns;

use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;

trait HasDependentDelete
{
    public static function dependentDeleteAction(): DeleteAction
    {
        return DeleteAction::make()
            ->label('Hapus')
            ->icon('heroicon-m-trash')
            ->before(function ($record): ?bool {
                return static::handleDependentDelete($record);
            });
    }

    protected static function handleDependentDelete($record): ?bool
    {
        if (! method_exists($record, 'hasDependents') || ! $record->hasDependents()) {
            return null;
        }

        $record->deactivate();

        Notification::make()
            ->title('Data tidak dapat dihapus')
            ->body('Data masih digunakan oleh data lain, sehingga telah dinonaktifkan sebagai gantinya.')
            ->warning()
            ->send();

        return false;
    }
}
