<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPermissions extends Model
{
    /** @use HasFactory<\Database\Factories\AppPermissionsFactory> */
    use HasFactory;

    protected $fillable = ['hak_akses'];

    public function roles()
    {
        return $this->belongsToMany(AppRoles::class, 'app_roles_permissions', 'id_akses', 'id_peran');
    }
}
