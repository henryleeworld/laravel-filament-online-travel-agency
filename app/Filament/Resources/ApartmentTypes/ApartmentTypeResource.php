<?php

namespace App\Filament\Resources\ApartmentTypes;

use App\Filament\Resources\ApartmentTypes\Pages\CreateApartmentType;
use App\Filament\Resources\ApartmentTypes\Pages\EditApartmentType;
use App\Filament\Resources\ApartmentTypes\Pages\ListApartmentTypes;
use App\Filament\Resources\ApartmentTypes\Schemas\ApartmentTypeForm;
use App\Filament\Resources\ApartmentTypes\Tables\ApartmentTypesTable;
use App\Models\ApartmentType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ApartmentTypeResource extends Resource
{
    protected static ?string $model = ApartmentType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup = 'Facilities';

    public static function form(Schema $schema): Schema
    {
        return ApartmentTypeForm::configure($schema);
    }

    public static function getModelLabel(): string
    {
        return __('apartment type');
    }

    public static function getNavigationGroup(): ?string
    {
        return __(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return __('Apartment Types');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApartmentTypes::route('/'),
            'create' => CreateApartmentType::route('/create'),
            'edit' => EditApartmentType::route('/{record}/edit'),
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
        return ApartmentTypesTable::configure($table);
    }
}
