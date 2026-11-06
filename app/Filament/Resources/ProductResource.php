<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Illuminate\Database\Eloquent\Builder;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Data Produk';

    protected static ?string $pluralModelLabel = 'Data Produk';

    protected static ?string $slug = 'products';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->description('Data produk kecantikan yang dijual oleh Octa Beauty Care.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Produk')
                            ->helperText('Contoh: Serum Vitamin C, Masker Wajah')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->helperText('Contoh: serum-vitamin-c, masker-wajah')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('category')
                            ->label('Kategori')
                            ->helperText('Contoh: Perawatan Wajah, Body Care')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->helperText('Deskripsi singkat tentang produk')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->helperText('Contoh: 150000')
                            ->placeholder('Contoh: 150000')
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

                        Forms\Components\TextInput::make('stock')
                            ->label('Stok')
                            ->helperText('Jumlah stok tersedia')
                            ->placeholder('Contoh: 10')
                            ->numeric()
                            ->required()
                            ->default(0),

                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->helperText('Upload foto produk'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Nonaktifkan jika produk tidak tersedia')
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

                Tables\Columns\TextColumn::make('category')
                    ->badge(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('idr'),

                Tables\Columns\TextColumn::make('stock')
                    ->label('Stok'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

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
            'index' => \App\Filament\Resources\ProductResource\Pages\ListProducts::route('/'),
            'create' => \App\Filament\Resources\ProductResource\Pages\CreateProduct::route('/create'),
            'edit' => \App\Filament\Resources\ProductResource\Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
