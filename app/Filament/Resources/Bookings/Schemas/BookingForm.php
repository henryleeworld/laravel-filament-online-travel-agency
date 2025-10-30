<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('apartment_id')
                    ->label(__('Apartment'))
                    ->relationship('apartment', 'name')
                    ->searchable()
                    ->required(),
                Select::make('user_id')
                    ->label(__('User'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
                DatePicker::make('start_date')
                    ->label(__('Start date'))
                    ->required(),
                DatePicker::make('end_date')
                    ->label(__('End date'))
                    ->required(),
                TextInput::make('guests_adults')
                    ->label(__('Guests adults'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
                TextInput::make('guests_children')
                    ->label(__('Guests children'))
                    ->integer()
                    ->minValue(0)
                    ->required(),
            ]);
    }
}
