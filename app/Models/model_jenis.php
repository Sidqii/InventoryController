<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_jenis extends Model
{
    use HasFactory;

    protected $table = 'app_jenis';

    protected $fillable = ['jenis'];
}
