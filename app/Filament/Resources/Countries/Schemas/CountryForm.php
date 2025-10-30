<?php

namespace App\Filament\Resources\Countries\Schemas;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->label(__('Name')),
                TextInput::make('lat')
                    ->label(__('Latitude'))
                    ->rules([new LatitudeRule()])
                    ->required(),
                TextInput::make('long')
                    ->label(__('Longitude'))
                    ->rules([new LongitudeRule()])
                    ->required(),
            ]);
    }
}
