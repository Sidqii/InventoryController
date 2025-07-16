<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_pengajuan_unit extends Model
{
    use HasFactory;

    protected $table = 'app_pengajuan_unit';

    protected $fillable = [
        'id_pengajuan',
        'id_unit_barang',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(model_pengajuan::class, 'id_pengajuan');
    }

    public function unit_barang()
    {
        return $this->belongsTo(model_unitbarang::class, 'id_unit_barang');
    }
}
