<?php

namespace App\Filament\Resources\ApartmentResource\RelationManagers;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PropertyRelationManager extends RelationManager
{
    protected static string $relationship = 'property';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                Forms\Components\TextInput::make('address_street')
                    ->label(__('Address street'))
                    ->required(),
                Forms\Components\TextInput::make('address_postcode')
                    ->label(__('Address postcode'))
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->label(__('City'))
                    ->relationship('city', 'name')
                    ->preload()
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('lat')
                    ->label(__('Latitude'))
                    ->required()
                    ->rules([new LatitudeRule()]),
                Forms\Components\TextInput::make('long')
                    ->label(__('Longitude'))
                    ->required()
                    ->rules([new LongitudeRule()]),
                Forms\Components\Select::make('owner_id')
                    ->label(__('Owner'))
                    ->relationship('owner', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('photo')
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
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('owner.name')
                    ->label(__('Owner')),
                Tables\Columns\TextColumn::make('address')
                    ->label(__('Address')),
                Tables\Columns\TextColumn::make('city.name')
                    ->label(__('City')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
