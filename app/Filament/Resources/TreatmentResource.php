<?php

namespace App\Filament\Resources;

use App\Filament\Actions\DeactivateOrDeleteBulk;
use App\Filament\Concerns\HasDependentDelete;
use App\Filament\Resources\TreatmentResource\Pages\CreateTreatment;
use App\Filament\Resources\TreatmentResource\Pages\EditTreatment;
use App\Filament\Resources\TreatmentResource\Pages\ListTreatments;
use App\Models\Product;
use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;

class TreatmentResource extends Resource
{
    use HasDependentDelete;

    protected static ?string $model = Treatment::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Data Treatment';

    protected static ?string $pluralModelLabel = 'Data Treatment';

    protected static ?string $slug = 'treatments';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Treatment')
                    ->description('Isi data treatment yang akan ditampilkan di website pelanggan.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Treatment')
                            ->helperText('Contoh: Facial Glow, Anti Aging, Konsultasi Kulit')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Treatment')
                            ->helperText('Ceritakan singkat tentang treatment ini')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->helperText('Contoh: 250000')
                            ->placeholder('Contoh: 250000')
                            ->prefix('Rp ')
                            ->numeric()
                            ->mask(RawJs::make("
                                () => IMask().createMask({
                                    blocks: {
                                        num: {
                                            mask: Number,
                                            thousandsSeparator: '.',
                                            padFractionalZeros: false,
                                            sign: '-'
                                        }
                                    }
                                })
                            "))
                            ->required(),

                        Forms\Components\TextInput::make('duration_minutes')
                            ->label('Durasi (Menit)')
                            ->helperText('Contoh: 60')
                            ->placeholder('Contoh: 60')
                            ->numeric()
                            ->required(),

                        Forms\Components\CheckboxList::make('product_ids')
                            ->label('Produk yang Digunakan')
                            ->helperText('Pilih produk yang digunakan dalam treatment ini')
                            ->options(fn () => Product::query()->where('is_active', true)->pluck('name', 'id'))
                            ->columns(3),

                        Forms\Components\TextInput::make('price_label')
                            ->label('Label Harga (Tampilan)')
                            ->helperText('Contoh: Mulai Rp 250rb')
                            ->maxLength(100),

                        Forms\Components\TextInput::make('filter')
                            ->label('Filter / Kategori')
                            ->helperText('Contoh: facial, brightening, anti-aging, consultation')
                            ->maxLength(100),

                        Forms\Components\Toggle::make('is_primary')
                            ->label('Treatment Utama')
                            ->helperText('Tandai sebagai treatment utama / primer')
                            ->default(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Nonaktifkan jika treatment tidak tersedia')
                            ->default(true),

                        Forms\Components\Toggle::make('show_detail_button')
                            ->label('Tampilkan Tombol Detail di Daftar')
                            ->helperText('Tampilkan tombol "Lihat Detail" di halaman daftar treatment')
                            ->default(true),

                        Forms\Components\Toggle::make('show_booking_button')
                            ->label('Tampilkan Tombol Booking di Detail')
                            ->helperText('Tampilkan tombol "Booking Sekarang" di halaman detail treatment')
                            ->default(true),

                        Forms\Components\TextInput::make('alt')
                            ->label('Alt Text Gambar')
                            ->helperText('Deskripsi gambar untuk aksesibilitas')
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Treatment')
                            ->helperText('Upload gambar treatment untuk ditampilkan di website pelanggan.')
                            ->image()
                            ->directory('treatment-images')
                            ->visibility('public')
                            ->imageEditor(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Treatment')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('idr')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('Durasi')
                    ->formatStateUsing(fn ($state) => $state ? $state.' Menit' : '-')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_label')
                    ->label('Label Harga')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('filter')
                    ->label('Filter')
                    ->badge()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_primary')
                    ->boolean()
                    ->label('Utama')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Ubah')
                    ->icon('heroicon-m-pencil'),
                self::dependentDeleteAction(),
            ])
            ->bulkActions([
                DeactivateOrDeleteBulk::make()->name('deactivate_or_delete_treatments'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTreatments::route('/'),
            'create' => CreateTreatment::route('/create'),
            'edit' => EditTreatment::route('/{record}/edit'),
        ];
    }
}
