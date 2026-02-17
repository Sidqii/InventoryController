<?php

namespace App\Services\Authentication;

use Illuminate\Support\Facades\Auth;

class AuthLoginService
{
    public function credential(array $credentials)
    {
        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            throw new \Exception('Invalid email or password', 401);
        }

        /** @var \App\Models\User $user */

        $user = Auth::guard('api')->user();

        $user->load('roles');

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
