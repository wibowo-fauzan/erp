<?php

namespace App\Filament\Resources;

use App\Models\Promotion;
use App\Filament\Actions\DeactivateOrDeleteBulk;
use App\Filament\Concerns\HasDependentDelete;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Illuminate\Database\Eloquent\Builder;

class PromotionResource extends Resource
{
    use HasDependentDelete;
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Data Promo';

    protected static ?string $pluralModelLabel = 'Data Promo';

    protected static ?string $slug = 'promotions';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Promo')
                    ->description('Kode promo yang dapat digunakan pelanggan saat booking.')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->label('Kode Promo')
                            ->helperText('Contoh: DISKON20, HEMAT50')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),

                        Forms\Components\TextInput::make('name')
                            ->label('Nama Promo')
                            ->helperText('Contoh: Diskon 20%, Promo Hemat')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->helperText('Deskripsi singkat tentang promo ini')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('treatment_slug')
                            ->label('Treatment')
                            ->helperText('Pilih treatment yang Berlaku (kosongkan untuk semua treatment)')
                            ->options(fn () => \App\Models\Treatment::query()->where('is_active', true)->pluck('name', 'slug'))
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('discount_amount')
                            ->label('Nominal Diskon (Rp)')
                            ->helperText('Contoh: 50000')
                            ->placeholder('Contoh: 50000')
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

                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai Berlaku')
                            ->required(),

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai Berlaku'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Nonaktifkan jika promo tidak tersedia')
                            ->default(true),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Kode Promo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Promo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

                Tables\Columns\TextColumn::make('treatment_slug')
                    ->label('Treatment')
                    ->formatStateUsing(fn ($state) => $state ? \App\Models\Treatment::query()->where('slug', $state)->value('name') ?? $state : 'Semua Treatment'),

                Tables\Columns\TextColumn::make('discount_amount')
                    ->label('Diskon')
                    ->money('idr'),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date(),

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
                DeactivateOrDeleteBulk::make()->name('deactivate_or_delete_promotions'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PromotionResource\Pages\ListPromotions::route('/'),
            'create' => \App\Filament\Resources\PromotionResource\Pages\CreatePromotion::route('/create'),
            'edit' => \App\Filament\Resources\PromotionResource\Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
