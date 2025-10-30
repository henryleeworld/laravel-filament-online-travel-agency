<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\Role;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Password;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('role.name')
                    ->label(__('Role')),
                TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('role')
                    ->label(__('Role'))
                    ->options([
                        Role::ROLE_USER => __('User'),
                        Role::ROLE_OWNER => __('Property Owner'),
                        Role::ROLE_ADMINISTRATOR => __('Administrator'),
                    ])
                    ->attribute('role_id'),
            ])
            ->recordActions([
                Action::make('changePassword')
                    ->label(__('Change password'))
                    ->action(function (User $record, array $data): void {
                        $record->update([
                            'password' => $data['new_password'],
                        ]);
                        Notification::make()
                            ->title(__('Password changed successfully.'))
                            ->success()
                            ->send();
                    })
                    ->schema([
                        TextInput::make('new_password')
                            ->label(__('New Password'))
                            ->maxLength(255)
                            ->password()
                            ->rule(Password::default())
                            ->dehydrateStateUsing(fn (string $state): string => $state)
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create'),
                        TextInput::make('new_password_confirmation')
                            ->label(__('Confirm New Password'))
                            ->password()
                            ->rule('required', fn(Get $get) => ! ! $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                    ->visible(auth()->user()->role_id === Role::ROLE_ADMINISTRATOR),
                    // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),
                Action::make('deactivate')
                    ->label(__('Deactivate'))
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->action(fn (User $record) => $record->delete())
                    ->visible(auth()->user()->role_id === Role::ROLE_ADMINISTRATOR),
                    // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
