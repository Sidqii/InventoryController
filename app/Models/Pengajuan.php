<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'app_pengajuan';

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
