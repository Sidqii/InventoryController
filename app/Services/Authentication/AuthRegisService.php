<?php

namespace App\Services\Authentication;

use App\Models\RBAC\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthRegisService
{
    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['code'] = $this->generateCode();

            $user = User::create($data);

            $emplRole = Role::where('code', 'EMPLOYEE')->firstOrFail();

            if (!$emplRole) {
                throw new Exception('Registration cannot be continued');
            }

            $user->roles()->attach($emplRole->id);

            return $user;
        });
    }

    public function generateCode()
    {
        $prefix = 'EMP';

        $lastUser = User::lockForUpdate()->orderByDesc('id')->first();

        if (!$lastUser || !$lastUser->code) {
            return $prefix . '0001';
        }

        $lastNumber = (int) substr($lastUser->code, strlen($prefix));

        $newNumber = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
