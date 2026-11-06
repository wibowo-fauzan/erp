<?php

namespace App\Filament\Actions;

use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;

class DeactivateOrDeleteBulk extends BulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Hapus Dipilih');
        $this->icon('heroicon-m-trash');
        $this->color('danger');
        $this->requiresConfirmation();
        $this->modalHeading('Hapus Data yang Dipilih');
        $this->modalDescription('Data yang masih digunakan oleh booking tidak dapat dihapus dan akan dinonaktifkan sebagai gantinya.');
        $this->modalSubmitActionLabel('Hapus');
    }

    public function handle($records): void
    {
        $deactivated = 0;
        $deleted = 0;

        foreach ($records as $record) {
            if (is_object($record) && method_exists($record, 'hasDependents') && $record->hasDependents()) {
                $record->deactivate();
                $deactivated++;
            } elseif (is_object($record)) {
                $record->delete();
                $deleted++;
            }
        }

        if ($deactivated > 0) {
            Notification::make()
                ->title("$deactivated data dinonaktifkan")
                ->body('Data yang masih digunakan tidak dapat dihapus, sehingga telah dinonaktifkan.')
                ->warning()
                ->send();
        }

        if ($deleted > 0) {
            Notification::make()
                ->title("$deleted data berhasil dihapus")
                ->success()
                ->send();
        }
    }
}
