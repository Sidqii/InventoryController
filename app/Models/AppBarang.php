<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppBarang extends Model
{
    /** @use HasFactory<\Database\Factories\AppBarangFactory> */
    use HasFactory;

    protected $table = 'app_barang';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'id_kategori',
        'id_jenis',
        'merk',
        'spek_barang',
        'deskripsi',
        'tgl_pengadaan',
        'garansi',
        'sumber_barang',
        'vendor',
        'note_perawatan',
    ];

    public function kategori()
    {
        return $this->belongsTo(AppKategori::class, 'id_kategori');
    }

    public function jenis()
    {
        return $this->belongsTo(AppJenis::class, 'id_jenis');
    }

    public function unitBarang()
    {
        return $this->hasMany(AppUnitBarang::class, 'id_barang');
    }
}
