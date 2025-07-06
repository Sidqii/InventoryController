<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class model_unitbarang extends Model
{
    use HasFactory;

    protected $table = 'app_unit_barang';

    protected $fillable = [
        'id_barang',
        'id_kepemilikan',
        'kode_unit',
        'no_seri',
        'id_kondisi',
        'id_status',
        'id_lokasi',
        'tgl_terima',
        'ket_unit',
        'foto',
    ];

    public function barang()
    {
        return $this->belongsTo(model_barang::class, 'id_barang');
    }

    public function kondisi()
    {
        return $this->belongsTo(model_kondisi::class, 'id_kondisi');
    }

    public function status()
    {
        return $this->belongsTo(model_status::class, 'id_status');
    }

    public function lokasi()
    {
        return $this->belongsTo(model_lokasi::class, 'id_lokasi');
    }

    public function kepemilikan()
    {
        return $this->belongsTo(model_kepemilikan::class, 'id_kepemilikan');
    }
}
