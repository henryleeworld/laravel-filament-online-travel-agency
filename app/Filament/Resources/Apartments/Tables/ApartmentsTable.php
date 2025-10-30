<?php

namespace App\Filament\Resources\Apartments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('apartment_type.name')
                    ->label(__('Apartment type')),
                TextColumn::make('property.name')
                    ->label(__('Property')),
                TextColumn::make('size')
                    ->label(__('Size')),
                TextColumn::make('bookings_avg_rating')
                    ->label(__('Rating'))
                    ->placeholder(0)
                    ->avg('bookings', 'rating')
                    ->formatStateUsing(fn (string $state): string => number_format($state, 2)),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
