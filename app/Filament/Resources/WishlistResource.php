<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WishlistResource\Pages\CreateWishlist;
use App\Filament\Resources\WishlistResource\Pages\EditWishlist;
use App\Filament\Resources\WishlistResource\Pages\ListWishlists;
use App\Models\Wishlist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WishlistResource extends Resource
{
    protected static ?string $model = Wishlist::class;

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationLabel = 'Wishlist';

    protected static ?string $pluralModelLabel = 'Data Wishlist';

    protected static ?string $slug = 'wishlists';

    public static function canAccess(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'owner'], true);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Wishlist')
                    ->description('Data treatment yang difavoritkan pelanggan.')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Pelanggan')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('treatment_slug')
                            ->label('Treatment')
                            ->relationship('treatment', 'name', fn (Builder $query) => $query->where('is_active', true))
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('treatment.name')
                    ->label('Treatment')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Pelanggan')
                    ->relationship('user', 'name'),
            ])
            ->actions([
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
            'index' => ListWishlists::route('/'),
            'create' => CreateWishlist::route('/create'),
            'edit' => EditWishlist::route('/{record}/edit'),
        ];
    }
}
