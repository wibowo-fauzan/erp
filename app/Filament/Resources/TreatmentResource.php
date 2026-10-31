<?php

namespace App\Filament\Resources;

use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TreatmentResource extends Resource
{
    protected static ?string $model = Treatment::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Data Treatment';

    protected static ?string $pluralModelLabel = 'Data Treatment';

    protected static ?string $slug = 'treatments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Treatment')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Treatment')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('category')
                            ->options([
                                'Facial' => 'Facial',
                                'Brightening' => 'Brightening',
                                'Anti Aging' => 'Anti Aging',
                                'Consultation' => 'Consultation',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('duration_minutes')
                            ->label('Durasi (Menit)')
                            ->placeholder('Contoh: 60')
                            ->numeric()
                            ->maxLength(10),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->placeholder('Contoh: Mulai Rp 250rb')
                            ->maxLength(100),

                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('treatments'),

                        Forms\Components\TextInput::make('action')
                            ->label('Aksi')
                            ->placeholder('Contoh: Detail Treatment')
                            ->maxLength(255),

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

                Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('Durasi')
                    ->formatStateUsing(fn ($state) => $state . ' Menit'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Facial' => 'Facial',
                        'Brightening' => 'Brightening',
                        'Anti Aging' => 'Anti Aging',
                        'Consultation' => 'Consultation',
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
            'index' => \App\Filament\Resources\TreatmentResource\Pages\ListTreatments::route('/'),
            'create' => \App\Filament\Resources\TreatmentResource\Pages\CreateTreatment::route('/create'),
            'edit' => \App\Filament\Resources\TreatmentResource\Pages\EditTreatment::route('/{record}/edit'),
        ];
    }
}
