<?php

namespace App\Filament\Resources\FacilityCategories;

use App\Filament\Resources\FacilityCategories\Pages\CreateFacilityCategory;
use App\Filament\Resources\FacilityCategories\Pages\EditFacilityCategory;
use App\Filament\Resources\FacilityCategories\Pages\ListFacilityCategories;
use App\Filament\Resources\FacilityCategories\RelationManagers\FacilitiesRelationManager;
use App\Filament\Resources\FacilityCategories\Schemas\FacilityCategoryForm;
use App\Filament\Resources\FacilityCategories\Tables\FacilityCategoriesTable;
use App\Models\FacilityCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FacilityCategoryResource extends Resource
{
    protected static ?string $model = FacilityCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup = 'Facilities';

    public static function form(Schema $schema): Schema
    {
        return FacilityCategoryForm::configure($schema);
    }

    public static function getModelLabel(): string
    {
        return __('facility category');
    }

    public static function getNavigationGroup(): ?string
    {
        return __(static::$navigationGroup);
    }

    public static function getNavigationLabel(): string
    {
        return __('Facility Categories');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFacilityCategories::route('/'),
            'create' => CreateFacilityCategory::route('/create'),
            'edit' => EditFacilityCategory::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            FacilitiesRelationManager::class,
        ];
    }

    public static function table(Table $table): Table
    {
        return FacilityCategoriesTable::configure($table);
    }
}
