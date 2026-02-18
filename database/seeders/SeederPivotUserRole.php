<?php

namespace Database\Seeders;

use App\Models\RBAC\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class SeederPivotUserRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@mail.com')->first();
        $role = Role::where('code', 'ADMIN')->first();

        if ($user && $role) {
            $user->roles()->sync([$role->id]);
        }
    }
}
