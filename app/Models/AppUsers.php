<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppUsers extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AppUsersFactory> */
    use HasFactory;

    protected $table = 'app_users';

    protected $fillable = ['nama', 'id_peran', 'email', 'password'];

    protected $hidden = ['password'];

    public function roles()
    {
        return $this->belongsTo(AppRoles::class, 'id_peran');
    }

    public function pengajuan()
    {
        return $this->hasMany(AppPengajuan::class, 'id_pengguna');
    }
}
