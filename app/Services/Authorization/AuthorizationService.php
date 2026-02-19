<?php

namespace App\Services\Authorization;

use App\Models\User;
use Exception;

Class AuthorizationService
{
    public function authorize(User $user, string $perms)
    {
        if (!$user->hasPermission($perms)) {
            throw new Exception('Forbidden');
        }
    }
}