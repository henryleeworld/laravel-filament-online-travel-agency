<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentTypeResource\Pages;
use App\Models\ApartmentType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApartmentTypeResource extends Resource
{
    protected static ?string $model = ApartmentType::class;

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
            'index' => Pages\ListApartmentTypes::route('/'),
            'create' => Pages\CreateApartmentType::route('/create'),
            'edit' => Pages\EditApartmentType::route('/{record}/edit'),
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
