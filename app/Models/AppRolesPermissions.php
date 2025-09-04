<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRolesPermissions extends Model
{
    /** @use HasFactory<\Database\Factories\AppRolesPermissionsFactory> */
    use HasFactory;

    protected $table = 'app_roles_permissions';

    protected $fillable = ['id_peran', 'id_akses'];
}
