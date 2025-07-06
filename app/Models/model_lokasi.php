<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_lokasi extends Model
{
    use HasFactory;

    protected $table = 'app_lokasi';

    protected $fillable = [
        'nama_lokasi',
        'kode_lokasi',
        'keterangan',
    ];
}
