<?php

namespace App\Filament\Resources;

use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Data Booking';

    protected static ?string $pluralModelLabel = 'Data Booking';

    protected static ?string $slug = 'bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Booking')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('Pelanggan')
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('reference')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->disabledOn('edit'),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(30),

                        Forms\Components\Select::make('treatment_slug')
                            ->label('Treatment')
                            ->options(fn () => \App\Models\Treatment::query()->where('is_active', true)->pluck('title', 'slug'))
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\DatePicker::make('booking_date')
                            ->required()
                            ->minDate(now()),

                        Forms\Components\Select::make('booking_time')
                            ->options([
                                '09:00' => '09:00',
                                '10:30' => '10:30',
                                '12:00' => '12:00',
                                '13:30' => '13:30',
                                '15:00' => '15:00',
                                '16:30' => '16:30',
                                '18:00' => '18:00',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('promotion_code')
                            ->label('Kode Promo')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('notes')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('status')
                            ->options([
                                'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ])
                            ->required()
                            ->default('menunggu_konfirmasi'),

                        Forms\Components\Select::make('payment_status')
                            ->options([
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->default('menunggu_verifikasi'),

                        Forms\Components\FileUpload::make('payment_proof')
                            ->image()
                            ->directory('payment-proofs'),

                        Forms\Components\DateTimePicker::make('verified_at')
                            ->label('Tanggal Verifikasi'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()
                    ->sortable()
                    ->label('Referensi'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Telepon'),

                Tables\Columns\TextColumn::make('treatment_slug')
                    ->label('Treatment')
                    ->formatStateUsing(fn ($state) => \App\Models\Treatment::query()->where('slug', $state)->value('title') ?? $state),

                Tables\Columns\TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('booking_time')
                    ->label('Waktu'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'menunggu_konfirmasi',
                        'success' => 'dikonfirmasi',
                        'primary' => 'selesai',
                        'danger' => 'dibatalkan',
                    ]),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->colors([
                        'warning' => 'menunggu_verifikasi',
                        'success' => 'dikonfirmasi',
                        'danger' => 'ditolak',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\BookingResource\Pages\ListBookings::route('/'),
            'create' => \App\Filament\Resources\BookingResource\Pages\CreateBooking::route('/create'),
            'edit' => \App\Filament\Resources\BookingResource\Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
