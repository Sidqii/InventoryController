<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppJenis extends Model
{
    /** @use HasFactory<\Database\Factories\AppJenisFactory> */
    use HasFactory;

    protected $table = 'app_jenis';

    protected $fillable = ['jenis'];
}
