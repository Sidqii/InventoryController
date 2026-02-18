<?php

namespace App\Models\RBAC;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_role',
            'role_id',
            'user_id',
        );
    }

    public function perms()
    {
        return $this->belongsToMany(
            Permission::class,
            'perm_role',
            'role_id',
            'perm_id'
        );
    }
}
