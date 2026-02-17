<?php

namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'perms';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsToMany(
            Role::class,
            'perm_role',
            'perm_id',
            'role_id'
        );
    }
}
