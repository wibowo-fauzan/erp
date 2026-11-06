<?php

namespace App\Filament\Resources;

use App\Models\TreatmentPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Illuminate\Database\Eloquent\Builder;

class TreatmentPackageResource extends Resource
{
    protected static ?string $model = TreatmentPackage::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Data Paket Treatment';

    protected static ?string $pluralModelLabel = 'Data Paket Treatment';

    protected static ?string $slug = 'treatment-packages';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Paket Treatment')
                    ->description('Paket gabungan beberapa treatment dalam satu harga paket.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Paket')
                            ->helperText('Contoh: Paket Glow Lengkap, Paket Anti Aging Premium')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->helperText('Contoh: paket-glow-lengkap, paket-anti-aging-premium')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Paket')
                            ->helperText('Ceritakan isi paket treatment')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga Paket')
                            ->helperText('Contoh: 500000')
                            ->placeholder('Contoh: 500000')
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
                            ->label('Durasi Paket (Menit)')
                            ->helperText('Contoh: 120')
                            ->placeholder('Contoh: 120')
                            ->numeric()
                            ->maxLength(10),

                        Forms\Components\TextInput::make('treatment_ids')
                            ->label('Treatment yang Termasuk')
                            ->helperText('Masukkan ID treatment yang termasuk dalam paket, pisahkan dengan koma. Contoh: 1,2,3')
                            ->placeholder('Contoh: 1,2,3')
                            ->maxLength(255)
                            ->afterStateHydrated(function ($state, $set) {
                                if (is_array($state)) {
                                    $set('treatment_ids', implode(',', $state));
                                }
                            })
                            ->dehydrateStateUsing(fn ($state) => is_string($state) ? array_filter(array_map('trim', explode(',', $state))) : $state),

                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('treatment-packages')
                            ->helperText('Upload foto paket'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Nonaktifkan jika paket tidak tersedia')
                            ->default(true),
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
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga Paket')
                    ->money('idr'),

                Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('Durasi')
                    ->formatStateUsing(fn ($state) => $state ? $state . ' Menit' : '-'),

                Tables\Columns\TextColumn::make('treatment_ids')
                    ->label('Treatment')
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : '-'),

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
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->icon('heroicon-m-trash'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus Dipilih'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\TreatmentPackageResource\Pages\ListTreatmentPackages::route('/'),
            'create' => \App\Filament\Resources\TreatmentPackageResource\Pages\CreateTreatmentPackage::route('/create'),
            'edit' => \App\Filament\Resources\TreatmentPackageResource\Pages\EditTreatmentPackage::route('/{record}/edit'),
        ];
    }
}
