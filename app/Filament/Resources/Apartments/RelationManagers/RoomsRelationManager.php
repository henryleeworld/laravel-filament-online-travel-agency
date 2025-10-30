<?php

namespace App\Filament\Resources\Apartments\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class RoomsRelationManager extends RelationManager
{
    protected static string $relationship = 'rooms';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->maxLength(255)
                    ->required(),
                Select::make('room_type_id')
                    ->label(__('Room type'))
                    ->relationship('room_type', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }

    protected static function getModelLabel(): string
    {
        return __('room');
    }

    protected function getTableHeading(): string
    {
        return __('Rooms');
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Rooms');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('room_type.name')
                    ->label(__('Room type')),
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
