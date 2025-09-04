<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppKategori extends Model
{
    /** @use HasFactory<\Database\Factories\AppKategoriFactory> */
    use HasFactory;

    protected $table = 'app_kategori';

    protected $fillable = ['kategori'];
}
