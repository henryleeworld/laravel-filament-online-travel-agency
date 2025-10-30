<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->unique(User::class, 'email', ignoreRecord: true)
                    ->required(),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->maxLength(255)
                    ->password()
                    ->rule(Password::default())
                    ->dehydrateStateUsing(fn (string $state): string => $state)
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create'),
            ]);
    }
}
