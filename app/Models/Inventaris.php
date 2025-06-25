<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Kondisi;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'app_inventaris';

    protected $fillable = [
        'nama_barang',
        'id_kategori',
        'id_status',
        'id_lokasi',
        'id_kondisi',
        'stok',
        'merk',
        'kode_barang',
        'deskripsi',
        'tanggal_pengadaan',
        'nilai_pengadaan',
        'riwayat_pemakaian',
        'catatan_perawatan',
        'spesifikasi_teknis',
        'log_transaksi',
    ];

    protected $casts = [
        'spesifikasi_teknis' => 'array',
        'log_transaksi' => 'array',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'id_kondisi');
    }
}
