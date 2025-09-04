<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPengajuanUnit extends Model
{
    /** @use HasFactory<\Database\Factories\AppPengajuanUnitFactory> */
    use HasFactory;

    protected $table = 'app_pengajuan_unit';

    protected $fillable = ['id_pengajuan', 'id_unit_barang'];
}
