<?php

namespace App\Filament\Resources\GeographicalObjects;

use App\Filament\Resources\GeographicalObjects\Pages\CreateGeographicalObject;
use App\Filament\Resources\GeographicalObjects\Pages\EditGeographicalObject;
use App\Filament\Resources\GeographicalObjects\Pages\ListGeographicalObjects;
use App\Filament\Resources\GeographicalObjects\Schemas\GeographicalObjectForm;
use App\Filament\Resources\GeographicalObjects\Tables\GeographicalObjectsTable;
use App\Models\Geoobject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GeographicalObjectResource extends Resource
{
    protected static ?string $model = Geoobject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup = 'Geography';

    public static function form(Schema $schema): Schema
    {
        return GeographicalObjectForm::configure($schema);
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
            'index' => ListGeographicalObjects::route('/'),
            'create' => CreateGeographicalObject::route('/create'),
            'edit' => EditGeographicalObject::route('/{record}/edit'),
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
        return GeographicalObjectsTable::configure($table);
    }
}
