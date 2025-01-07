<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Role;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Tables\Actions\Action;
use Illuminate\Validation\Rules\Password;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->unique()
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->label(__('Password'))
                    ->required()
                    ->password()
                    ->maxLength(255)
                    ->rule(Password::default())
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('user');
    }

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
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
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('role.name')
                    ->label(__('Role')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label(__('Role'))
                    ->options([
                        Role::ROLE_USER => __('User'),
                        Role::ROLE_OWNER => __('Property Owner'),
                        Role::ROLE_ADMINISTRATOR => __('Administrator'),
                    ])
                    ->attribute('role_id'),
            ])
            ->actions([
                Action::make('changePassword')
                    ->label(__('Change password'))
                    ->action(function (User $record, array $data): void {
                        $record->update([
                            'password' => $data['new_password'],
                        ]);

                        Filament::notify('success', __('Password changed successfully.'));
                    })
                    ->form([
                        Forms\Components\TextInput::make('new_password')
                            ->label(__('New Password'))
                            ->password()
                            ->required()
                            ->rule(Password::default()),
                        Forms\Components\TextInput::make('new_password_confirmation')
                            ->label(__('Confirm New Password'))
                            ->password()
                            ->rule('required', fn($get) => ! ! $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                    ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),
                Action::make('deactivate')
                    ->label(__('Deactivate'))
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->action(fn (User $record) => $record->delete())
                    ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
