<?php

namespace App\Filament\Resources\BedTypes;

use App\Filament\Resources\BedTypes\Pages\CreateBedType;
use App\Filament\Resources\BedTypes\Pages\EditBedType;
use App\Filament\Resources\BedTypes\Pages\ListBedTypes;
use App\Filament\Resources\BedTypes\Schemas\BedTypeForm;
use App\Filament\Resources\BedTypes\Tables\BedTypesTable;
use App\Models\BedType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BedTypeResource extends Resource
{
    protected static ?string $model = BedType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice ;

    protected static string|UnitEnum|null $navigationGroup = 'Facilities';

    public static function form(Schema $schema): Schema
    {
        return BedTypeForm::configure($schema);
    }

    public static function getModelLabel(): string
    {
        return __('bed type');
    }

    public static function getNavigationGroup(): ?string
    {
        return __(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return __('Bed Types');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBedTypes::route('/'),
            'create' => CreateBedType::route('/create'),
            'edit' => EditBedType::route('/{record}/edit'),
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
        return BedTypesTable::configure($table);
    }
}
