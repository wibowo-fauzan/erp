<?php

namespace App\Filament\Resources;

use App\Models\TreatmentAvailability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
class TreatmentAvailabilityResource extends Resource
{
    protected static ?string $model = TreatmentAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Jadwal Tersedia';

    protected static ?string $pluralModelLabel = 'Jadwal Tersedia';

    protected static ?string $slug = 'availability';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Ketersediaan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Libur Nasional, Owner Sibuk, dll'),

                        Forms\Components\Textarea::make('description')
                            ->label('Keterangan')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('type')
                            ->label('Tipe')
                            ->options([
                                'full_day' => 'Hari Penuh',
                                'partial_day' => 'Parcial (Jam Tertentu)',
                                'recurring' => 'Berulang (Setiap Minggu)',
                            ])
                            ->required()
                            ->default('full_day'),

                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required(),

                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Selesai'),

                        Forms\Components\TimePicker::make('start_time')
                            ->label('Waktu Mulai')
                            ->withoutSeconds(),

                        Forms\Components\TimePicker::make('end_time')
                            ->label('Waktu Selesai')
                            ->withoutSeconds(),

                        Forms\Components\CheckboxList::make('days_of_week')
                            ->label('Hari dalam Seminggu (untuk Berulang)')
                            ->options([
                                1 => 'Senin',
                                2 => 'Selasa',
                                3 => 'Rabu',
                                4 => 'Kamis',
                                5 => 'Jumat',
                                6 => 'Sabtu',
                                0 => 'Minggu',
                            ])
                            ->visible(fn ($get) => $get('type') === 'recurring'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->colors([
                        'warning' => 'full_day',
                        'info' => 'partial_day',
                        'primary' => 'recurring',
                    ])
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'full_day' => 'Hari Penuh',
                        'partial_day' => 'Parcial',
                        'recurring' => 'Berulang',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Tanggal Selesai')
                    ->date(),

                Tables\Columns\TextColumn::make('start_time')
                    ->label('Waktu Mulai'),

                Tables\Columns\TextColumn::make('end_time')
                    ->label('Waktu Selesai'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),

                Tables\Columns\TextColumn::make('created_by')
                    ->label('Dibuat Oleh')
                    ->formatStateUsing(fn ($record) => optional($record->creator)->name ?? '-'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'full_day' => 'Hari Penuh',
                        'partial_day' => 'Parcial',
                        'recurring' => 'Berulang',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif'),
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
            'index' => \App\Filament\Resources\TreatmentAvailabilityResource\Pages\ListTreatmentAvailabilities::route('/'),
            'create' => \App\Filament\Resources\TreatmentAvailabilityResource\Pages\CreateTreatmentAvailability::route('/create'),
            'edit' => \App\Filament\Resources\TreatmentAvailabilityResource\Pages\EditTreatmentAvailability::route('/{record}/edit'),
        ];
    }
}
