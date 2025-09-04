<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUnitBarang extends Model
{
    /** @use HasFactory<\Database\Factories\AppUnitBarangFactory> */
    use HasFactory;

    protected $table = 'app_unit_barang';

    protected $fillable = [
        'kode_unit',
        'no_seri',
        'id_barang',
        'id_kepemilikan',
        'id_status',
        'id_lokasi',
        'id_kondisi',
        'foto',
    ];

    public function barang()
    {
        return $this->belongsTo(AppBarang::class, 'id_barang');
    }

    public function kepemilikan()
    {
        return $this->belongsTo(AppKepemilikan::class, 'id_kepemilikan');
    }

    public function status()
    {
        return $this->belongsTo(AppStatus::class, 'id_status');
    }

    public function lokasi()
    {
        return $this->belongsTo(AppLokasi::class, 'id_lokasi');
    }

    public function kondisi()
    {
        return $this->belongsTo(AppKondisi::class, 'id_kondisi');
    }

    public function pengajuan()
    {
        return $this->belongsToMany(AppPengajuan::class, 'app_pengajuan_unit', 'id_unit_barang', 'id_pengajuan');
    }

    public function riwayat()
    {
        return $this->hasMany(AppRiwayatStatus::class, 'id_unit_barang');
    }
}
