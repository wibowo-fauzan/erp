<?php

namespace App\Filament\Resources;

use App\Models\Treatment;
use App\Filament\Actions\DeactivateOrDeleteBulk;
use App\Filament\Concerns\HasDependentDelete;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Illuminate\Database\Eloquent\Builder;

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

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Nonaktifkan jika treatment tidak tersedia')
                            ->default(true),

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
                    ->formatStateUsing(fn ($state) => $state ? $state . ' Menit' : '-')
                    ->sortable(),

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
            'index' => \App\Filament\Resources\TreatmentResource\Pages\ListTreatments::route('/'),
            'create' => \App\Filament\Resources\TreatmentResource\Pages\CreateTreatment::route('/create'),
            'edit' => \App\Filament\Resources\TreatmentResource\Pages\EditTreatment::route('/{record}/edit'),
        ];
    }
}
