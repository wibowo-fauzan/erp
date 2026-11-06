<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ProfilUsaha extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationGroup = 'Laporan & Profil';

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Profil Usaha';

    protected static ?string $title = 'Profil Usaha';

    protected static string $view = 'filament.pages.profil-usaha';

    public static function canView(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'owner'], true);
    }

    public function mount(): void
    {
        $this->form->fill([
            'nama_usaha' => 'Octa Beauty Care',
            'deskripsi' => '',
            'visi_misi' => '',
            'kontak' => '',
            'alamat' => '',
            'gambar' => null,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Usaha Octa Beauty Care')
                    ->description('Isi data usaha berikut. Data ini akan tampil di halaman website publik pelanggan.')
                    ->schema([
                        Forms\Components\TextInput::make('nama_usaha')
                            ->label('Nama Usaha')
                            ->helperText('Contoh: Octa Beauty Care')
                            ->required()
                            ->maxLength(255)
                            ->default('Octa Beauty Care'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Usaha')
                            ->helperText('Ceritakan singkat tentang usaha Anda, misalnya layanan utama, keunggulan, dll.')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('visi_misi')
                            ->label('Visi dan Misi')
                            ->helperText('Tuliskan visi dan misi usaha Anda')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('kontak')
                            ->label('Nomor Kontak / Telepon')
                            ->helperText('Contoh: 081234567890')
                            ->tel()
                            ->maxLength(30),

                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Lengkap / Lokasi')
                            ->helperText('Contoh: Jl. Raya Centex RT 11/10 No 66, Ciracas, Jakarta Timur')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar / Logo Usaha')
                            ->image()
                            ->directory('profil-usaha')
                            ->helperText('Upload gambar atau logo usaha'),
                    ])->columns(1),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('simpan')
                ->label('💾 Simpan Data Usaha')
                ->color('success')
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        unset($data['gambar']);

        Storage::disk('public')->put('business-profile.json', json_encode($data, JSON_PRETTY_PRINT));

        \Filament\Notifications\Notification::make()
            ->title('Profil usaha berhasil diperbarui')
            ->success()
            ->send();
    }
}
