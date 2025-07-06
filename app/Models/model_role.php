<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_role extends Model
{
    use HasFactory;

    protected $table = 'app_role';

    protected $fillable = ['role'];
}
