<?php

namespace Database\Seeders;

use App\Models\RBAC\Permission;
use App\Models\RBAC\Role;
use Illuminate\Database\Seeder;

class SeederPivotPermRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('code', 'ADMIN')->first();
        // $operator = Role::where('code', 'OPERATOR')->first();
        // $employee = Role::where('code', 'EMPLOYEE')->first();
        // $guest = Role::where('code', 'GUEST')->first();

        $allPerms = Permission::pluck('id')->toArray();

        //ADMIN permission
        $admin->perms()->sync($allPerms);

        // //OPERATOR permission
        // $operator->users()->sync(
        //     Permission::whereIn('code', [
        //         'insert_item',
        //         'update_item',
        //         'delete_item',
        //     ])->pluck('id')
        // );

        // //EMPLOYEE permission
        // $employee->users()->sync(
        //     Permission::whereIn('code', [
        //         'request_item',
        //         'observe_item',
        //     ])->pluck('id')
        // );

        // //GUEST permission
        // $guest->users()->sync(
        //     Permission::whereIn('code', 'observe_item')->pluck('id')
        // );
    }
}
