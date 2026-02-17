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
}
