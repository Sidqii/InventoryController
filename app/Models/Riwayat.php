<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'app_riwayat';

    protected $fillable = [
        'id_barang',
        'id_pengguna',
        'id_status',
        'instansi',
        'hal',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
