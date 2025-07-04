<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'app_role';

    protected $fillable = [
        'role'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
