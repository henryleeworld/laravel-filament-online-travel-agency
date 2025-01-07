<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentResource\Pages;
use App\Filament\Resources\ApartmentResource\RelationManagers;
use App\Models\Apartment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApartmentResource extends Resource
{
    protected static ?string $model = Apartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('apartment_type_id')
                    ->label(__('Apartment type'))
                    ->preload()
                    ->required()
                    ->searchable()
                    ->relationship('apartment_type', 'name'),
                Forms\Components\Select::make('property_id')
                    ->label(__('Property'))
                    ->preload()
                    ->required()
                    ->searchable()
                    ->relationship('property', 'name'),
                Forms\Components\TextInput::make('capacity_adults')
                    ->label(__('Capacity adults'))
                    ->integer()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('capacity_children')
                    ->label(__('Capacity children'))
                    ->integer()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('size')
                    ->label(__('Size'))
                    ->integer()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('bathrooms')
                    ->label(__('Bathrooms'))
                    ->integer()
                    ->required()
                    ->minValue(0),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('apartment');
    }

    public static function getNavigationLabel(): string
    {
        return __('Apartments');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApartments::route('/'),
            'create' => Pages\CreateApartment::route('/create'),
            'edit' => Pages\EditApartment::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PropertyRelationManager::class,
            RelationManagers\RoomsRelationManager::class,
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('apartment_type.name')
                    ->label(__('Apartment type')),
                Tables\Columns\TextColumn::make('property.name')
                    ->label(__('Property')),
                Tables\Columns\TextColumn::make('size')
                    ->label(__('Size')),
                Tables\Columns\TextColumn::make('bookings_avg_rating')
                    ->label(__('Rating'))
                    ->placeholder(0)
                    ->avg('bookings', 'rating')
                    ->formatStateUsing(fn (?string $state): ?string => number_format($state, 2)),
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
