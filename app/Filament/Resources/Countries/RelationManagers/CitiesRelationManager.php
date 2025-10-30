<?php

namespace App\Filament\Resources\Countries\RelationManagers;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'cities';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->maxLength(255)
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
            ]);
    }

    protected static function getModelLabel(): string
    {
        return __('city');
    }

    protected function getTableHeading(): string
    {
        return __('Cities');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('lat')
                    ->label(__('Latitude')),
                TextColumn::make('long')
                    ->label(__('Longitude')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
