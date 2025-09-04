<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppKepemilikan extends Model
{
    /** @use HasFactory<\Database\Factories\AppKepemilikanFactory> */
    use HasFactory;

    protected $table = 'app_kepemilikan';

    protected $fillable = ['jenis_kepemilikan'];
}
