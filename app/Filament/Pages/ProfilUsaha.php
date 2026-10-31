<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class ProfilUsaha extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Profil Usaha';

    protected static ?string $title = 'Profil Usaha';

    protected static string $view = 'filament.pages.profil-usaha';

    public function mount(): void
    {
        $this->form->fill([
            'nama_usaha' => 'Octa Beauty Care',
            'deskripsi' => '',
            'kontak' => '',
            'alamat' => '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identitas Usaha')
                    ->schema([
                        Forms\Components\TextInput::make('nama_usaha')
                            ->label('Nama Usaha')
                            ->required()
                            ->maxLength(255)
                            ->default('Octa Beauty Care'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('kontak')
                            ->label('Kontak')
                            ->tel()
                            ->maxLength(30),

                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('simpan')
                ->label('Simpan Perubahan')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        \Filament\Notifications\Notification::make()
            ->title('Profil usaha berhasil diperbarui')
            ->success()
            ->send();
    }
}
