<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages\CreateBooking;
use App\Filament\Resources\BookingResource\Pages\EditBooking;
use App\Filament\Resources\BookingResource\Pages\ListBookings;
use App\Models\Booking;
use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Data Booking';

    protected static ?string $pluralModelLabel = 'Data Booking';

    protected static ?string $slug = 'bookings';

    public static function canAccess(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['admin', 'owner'], true);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Booking')
                    ->description('Data pemesanan treatment pelanggan.')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('Pelanggan')
                            ->helperText('Pilih pelanggan yang melakukan booking')
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('reference')
                            ->label('Nomor Booking')
                            ->helperText('Contoh: OCTA-20261101-ABC123DEFG')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->disabledOn('edit'),

                        Forms\Components\Select::make('treatment_slug')
                            ->label('Treatment')
                            ->helperText('Pilih jenis treatment yang dipesan')
                            ->options(fn () => Treatment::query()->where('is_active', true)->pluck('name', 'slug'))
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('total_amount')
                            ->label('Biaya')
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

                        Forms\Components\DatePicker::make('booking_date')
                            ->label('Tanggal Booking')
                            ->helperText('Pilih tanggal pelayanan')
                            ->required()
                            ->minDate(now()),

                        Forms\Components\Select::make('booking_time')
                            ->label('Waktu Pelayanan')
                            ->helperText('Pilih jam pelayanan')
                            ->options([
                                '09:00' => '09:00 WIB',
                                '10:30' => '10:30 WIB',
                                '12:00' => '12:00 WIB',
                                '13:30' => '13:30 WIB',
                                '15:00' => '15:00 WIB',
                                '16:30' => '16:30 WIB',
                                '18:00' => '18:00 WIB',
                            ])
                            ->required(),

                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan')
                            ->helperText('Catatan tambahan dari pelanggan atau admin')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('status')
                            ->label('Status Booking')
                            ->helperText('Status pemesanan treatment')
                            ->options([
                                'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ])
                            ->required()
                            ->default('menunggu_konfirmasi'),

                        Forms\Components\Select::make('payment_status')
                            ->label('Status Pembayaran')
                            ->helperText('Status verifikasi pembayaran')
                            ->options([
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->default('menunggu_verifikasi'),

                        Forms\Components\FileUpload::make('payment_proof')
                            ->label('Bukti Pembayaran')
                            ->helperText('Upload bukti transfer jika ada')
                            ->image()
                            ->directory('payment-proofs'),

                        Forms\Components\DateTimePicker::make('verified_at')
                            ->label('Tanggal Verifikasi')
                            ->helperText('Tanggal pembayaran diverifikasi'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference')
                    ->label('Nomor Booking')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('treatment_slug')
                    ->label('Treatment')
                    ->formatStateUsing(fn ($state) => Treatment::query()->where('slug', $state)->value('name') ?? $state),

                Tables\Columns\TextColumn::make('booking_date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('booking_time')
                    ->label('Waktu'),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Biaya')
                    ->money('idr')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status Booking')
                    ->colors([
                        'warning' => 'menunggu_konfirmasi',
                        'success' => 'dikonfirmasi',
                        'primary' => 'selesai',
                        'danger' => 'dibatalkan',
                    ]),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Status Pembayaran')
                    ->colors([
                        'warning' => 'menunggu_verifikasi',
                        'success' => 'dikonfirmasi',
                        'danger' => 'ditolak',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Booking')
                    ->options([
                        'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'menunggu_verifikasi' => 'Menunggu Verifikasi',
                        'dikonfirmasi' => 'Dikonfirmasi',
                        'ditolak' => 'Ditolak',
                    ]),
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
            'index' => ListBookings::route('/'),
            'create' => CreateBooking::route('/create'),
            'edit' => EditBooking::route('/{record}/edit'),
        ];
    }
}
