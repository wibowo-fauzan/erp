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

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->helperText('Contoh: first-visit-special')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('name')
                            ->label('Nama Promo')
                            ->helperText('Contoh: Diskon 20%, Promo Hemat')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('eyebrow')
                            ->label('Eyebrow / Kategori')
                            ->helperText('Contoh: PROMO MEMBER BARU')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->helperText('Deskripsi singkat tentang promo ini')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('discount')
                            ->label('Teks Diskon (Tampilan)')
                            ->helperText('Contoh: 20%, Rp100rb')
                            ->maxLength(50),

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

                        Forms\Components\Select::make('treatment_slug')
                            ->label('Treatment')
                            ->helperText('Pilih treatment yang Berlaku (kosongkan untuk semua treatment)')
                            ->options(fn () => \App\Models\Treatment::query()->where('is_active', true)->pluck('name', 'slug'))
                            ->searchable()
                            ->preload()
                            ->nullable(),

                        Forms\Components\TextInput::make('validity')
                            ->label('Keterangan Berlaku')
                            ->helperText('Contoh: Berlaku untuk kunjungan pertama')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('minimum')
                            ->label('Syarat Minimum')
                            ->helperText('Contoh: Untuk semua treatment')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai Berlaku')
                            ->required(),

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai Berlaku'),

                        Forms\Components\TextInput::make('date')
                            ->label('Tanggal Tampilan')
                            ->helperText('Contoh: 01 Okt - 31 Okt 2026')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('detail_title')
                            ->label('Judul Detail')
                            ->helperText('Contoh: Diskon 20% Facial Treatment')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('detail_description')
                            ->label('Deskripsi Detail')
                            ->helperText('Deskripsi panjang untuk halaman detail promo')
                            ->maxLength(2000)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Promo')
                            ->image()
                            ->directory('promotions')
                            ->helperText('Upload gambar promo'),

                        Forms\Components\TextInput::make('alt')
                            ->label('Alt Text Gambar')
                            ->helperText('Deskripsi gambar untuk aksesibilitas')
                            ->maxLength(255),

                        Forms\Components\Select::make('style')
                            ->label('Gaya Tampilan')
                            ->helperText('Contoh: light, dark, compact')
                            ->options([
                                'light' => 'Light',
                                'dark' => 'Dark',
                                'compact' => 'Compact',
                            ])
                            ->default('light'),

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

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('style')
                    ->label('Gaya')
                    ->badge(),

                Tables\Columns\TextColumn::make('discount')
                    ->label('Diskon (Tampilan)'),

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
