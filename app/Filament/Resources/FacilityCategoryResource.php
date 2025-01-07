<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityCategoryResource\Pages;
use App\Filament\Resources\FacilityCategoryResource\RelationManagers;
use App\Models\FacilityCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FacilityCategoryResource extends Resource
{
    protected static ?string $model = FacilityCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Facilities';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
            ]);
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
            'index' => Pages\ListFacilityCategories::route('/'),
            'create' => Pages\CreateFacilityCategory::route('/create'),
            'edit' => Pages\EditFacilityCategory::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FacilitiesRelationManager::class,
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
