<?php

namespace App\Filament\Resources\GeographicalObjects\Schemas;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GeographicalObjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('lat')
                    ->label(__('Latitude'))
                    ->rules([new LatitudeRule()])
                    ->required(),
                TextInput::make('long')
                    ->label(__('Longitude'))
                    ->rules([new LongitudeRule()])
                    ->required(),
                Select::make('city_id')
                    ->label(__('City'))
                    ->relationship('city', 'name')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
