<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeographicalObjectResource\Pages;
use App\Models\Geoobject;
use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeographicalObjectResource extends Resource
{
    protected static ?string $model = Geoobject::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Geography';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('lat')
                    ->label(__('Latitude'))
                    ->required()
                    ->rules([new LatitudeRule()]),
                Forms\Components\TextInput::make('long')
                    ->label(__('Longitude'))
                    ->required()
                    ->rules([new LongitudeRule()]),
                Forms\Components\Select::make('city_id')
                    ->label(__('City'))
                    ->relationship('city', 'name')
                    ->preload()
                    ->required()
                    ->searchable()
                    ->columnSpanFull(),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('geographical object');
    }

    public static function getNavigationGroup(): ?string
    {
        return __(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return __('Geographical Objects');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeographicalObjects::route('/'),
            'create' => Pages\CreateGeographicalObject::route('/create'),
            'edit' => Pages\EditGeographicalObject::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('lat')
                    ->label(__('Latitude')),
                Tables\Columns\TextColumn::make('long')
                    ->label(__('Longitude')),
                Tables\Columns\TextColumn::make('city.name')
                    ->label(__('City')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
