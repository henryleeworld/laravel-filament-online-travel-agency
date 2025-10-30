<?php

namespace App\Filament\Resources\Apartments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->maxLength(255)
                    ->required(),
                Select::make('apartment_type_id')
                    ->label(__('Apartment type'))
                    ->relationship('apartment_type', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('property_id')
                    ->label(__('Property'))
                    ->relationship('property', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('capacity_adults')
                    ->label(__('Capacity adults'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
                TextInput::make('capacity_children')
                    ->label(__('Capacity children'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
                TextInput::make('size')
                    ->label(__('Size'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
                TextInput::make('bathrooms')
                    ->label(__('Bathrooms'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
            ]);
    }
}
