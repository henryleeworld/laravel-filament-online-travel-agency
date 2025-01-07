<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Role;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function getSubheading(): ?string
    {
        return __('This form will create an administrator user');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['role_id'] = Role::ROLE_ADMINISTRATOR;

        return $data;
    }
}
