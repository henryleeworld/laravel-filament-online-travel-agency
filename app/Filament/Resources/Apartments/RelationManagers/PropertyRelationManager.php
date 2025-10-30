<?php

namespace App\Filament\Resources\Apartments\RelationManagers;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PropertyRelationManager extends RelationManager
{
    protected static string $relationship = 'property';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('address_street')
                    ->label(__('Address street'))
                    ->required(),
                TextInput::make('address_postcode')
                    ->label(__('Address postcode'))
                    ->required(),
                Select::make('city_id')
                    ->label(__('City'))
                    ->relationship('city', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('lat')
                    ->label(__('Latitude'))
                    ->rules([new LatitudeRule()])
                    ->required(),
                TextInput::make('long')
                    ->label(__('Longitude'))
                    ->rules([new LongitudeRule()])
                    ->required(),
                Select::make('owner_id')
                    ->label(__('Owner'))
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('photo')
                    ->label(__('Photo'))
                    ->image()
                    ->maxSize(5000)
                    ->multiple()
                    ->columnSpanFull()
                    ->collection('avatars')
                    ->conversion('thumbnail'),
            ]);
    }

    protected static function getModelLabel(): string
    {
        return __('property');
    }

    protected function getTableHeading(): string
    {
        return __('Properties');
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Properties');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('owner.name')
                    ->label(__('Owner')),
                TextColumn::make('address')
                    ->label(__('Address')),
                TextColumn::make('city.name')
                    ->label(__('City')),
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
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
