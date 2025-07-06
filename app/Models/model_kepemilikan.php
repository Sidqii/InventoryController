<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_kepemilikan extends Model
{
    use HasFactory;

    protected $table = 'app_kepemilikan';

    protected $fillable = ['tipe'];
}
