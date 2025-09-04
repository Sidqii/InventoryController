<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppStatus extends Model
{
    /** @use HasFactory<\Database\Factories\AppStatusFactory> */
    use HasFactory;

    protected $table = 'app_status';

    protected $fillable = ['status'];
}
