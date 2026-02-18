<?php

namespace App\Models;

use App\Models\Inventory\StockMovement;
use App\Models\RBAC\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;
use \Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements JWTSubject
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'code',
        'email',
        'password',
        'department',
    ];

    protected $hidden = ['password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'user_role',
            'user_id',
            'role_id',
        );
    }

    public function executor()
    {
        return $this->hasMany(StockMovement::class, 'executed_by');
    }
}
