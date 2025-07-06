<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_user extends Model
{
    use HasFactory;

    protected $table = 'app_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role_id',
    ];
}
