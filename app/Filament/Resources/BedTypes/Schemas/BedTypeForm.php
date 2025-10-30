<?php

namespace App\Filament\Resources\BedTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BedTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
            ]);
    }
}
