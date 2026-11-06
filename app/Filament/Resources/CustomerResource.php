<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Pengguna';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Data Pelanggan';

    protected static ?string $pluralModelLabel = 'Data Pelanggan';

    protected static ?string $slug = 'customers';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', 'user');
    }

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pelanggan')
                    ->description('Data pelanggan yang terdaftar di website.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->helperText('Contoh: Fauzan Kirana')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->helperText('Contoh: fauzan@gmail.com')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Kontak')
                            ->helperText('Contoh: 081234567890')
                            ->tel()
                            ->maxLength(30),

                        Forms\Components\TextInput::make('password')
                            ->label('Kata Sandi')
                            ->helperText('Kosongkan jika tidak ingin mengubah kata sandi')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn ($livewire) => $livewire instanceof \App\Filament\Resources\CustomerResource\Pages\CreateCustomer)
                            ->maxLength(255),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Nonaktifkan jika pelanggan tidak boleh login')
                            ->default(true),

                        Forms\Components\FileUpload::make('avatar')
                            ->label('Foto Profil')
                            ->helperText('Upload foto profil pelanggan.')
                            ->image()
                            ->directory('customer-avatars')
                            ->visibility('public')
                            ->imageEditor(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Foto Profil')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Nomor Kontak'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Daftar Pada')
                    ->dateTime(),
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
            'index' => \App\Filament\Resources\CustomerResource\Pages\ListCustomers::route('/'),
            'create' => \App\Filament\Resources\CustomerResource\Pages\CreateCustomer::route('/create'),
            'edit' => \App\Filament\Resources\CustomerResource\Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
