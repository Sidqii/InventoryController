<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class model_barang extends Model
{
    use HasFactory;

    protected $table = 'app_barang';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'id_kategori',
        'id_jenis',
        'merk',
        'deskripsi',
        'spesifikasi_teknis',
        'tanggal_pengadaan',
        'masa_garansi',
        'sumber_pengadaan',
        'vendor',
        'jumlah_total_unit',
        'catatan_perawatan',
    ];

    protected $casts = [
        'spesifikasi_teknis' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(model_kategori::class, 'id_kategori');
    }

    public function lokasi()
    {
        return $this->belongsTo(model_lokasi::class, 'id');
    }

    public function jenis()
    {
        return $this->belongsTo(model_jenis::class, 'id_jenis');
    }

    public function updateJumUnit()
    {
        $this->jumlah_total_unit = $this->unit()->count();
        $this->save();
    }

    public function unit()
    {
        return $this->hasMany(model_unitbarang::class, 'id_barang');
    }
}
