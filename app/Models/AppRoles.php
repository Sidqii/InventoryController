<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRoles extends Model
{
    /** @use HasFactory<\Database\Factories\AppRolesFactory> */
    use HasFactory;

    protected $fillable = ['peran'];

    public function user()
    {
        return $this->hasMany(AppUsers::class, 'id_peran');
    }

    public function permissions()
    {
        return $this->belongsToMany(AppPermissions::class, 'app_roles_permissions', 'id_peran', 'id_akses');
    }
}
