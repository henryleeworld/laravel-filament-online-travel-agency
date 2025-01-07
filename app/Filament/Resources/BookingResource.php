<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('apartment_id')
                    ->label(__('Apartment'))
                    ->required()
                    ->searchable()
                    ->relationship('apartment', 'name'),
                Forms\Components\Select::make('user_id')
                    ->label(__('User'))
                    ->required()
                    ->searchable()
                    ->relationship('user', 'name'),
                Forms\Components\DatePicker::make('start_date')
                    ->label(__('Start date'))
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label(__('End date'))
                    ->required(),
                Forms\Components\TextInput::make('guests_adults')
                    ->label(__('Guests adults'))
                    ->integer()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('guests_children')
                    ->label(__('Guests children'))
                    ->integer()
                    ->required()
                    ->minValue(0),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('booking');
    }

    public static function getNavigationLabel(): string
    {
        return __('Bookings');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
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
                Tables\Columns\TextColumn::make('apartment.name')
                    ->label(__('Apartment')),
                Tables\Columns\TextColumn::make('start_date')
                    ->label(__('Start date'))
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label(__('End date'))
                    ->date(),
                Tables\Columns\TextColumn::make('total_price')
                    ->label(__('Total price'))
                    ->money(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label(__('Cancel')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label(__('Cancel')),
            ]);
    }
}
