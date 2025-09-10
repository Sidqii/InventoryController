<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppStatusUnit extends Model
{
    /** @use HasFactory<\Database\Factories\AppStatusUnitFactory> */
    use HasFactory;

    protected $table = 'app_status_unit';

    protected $fillable = ['status_unit'];
}
