<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_pengajuan extends Model
{
    use HasFactory;

    protected $table = 'app_pengajuan';

    protected $fillable = [
        'id_unit_barang',
        'id_pengguna',
        'id_status',
        'instansi',
        'hal',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function status_pengajuan()
    {
        return $this->belongsTo(model_status_pengajuan::class, 'id_status');
    }

    public function unit()
    {
        return $this->belongsTo(model_unitbarang::class, 'id_unit_barang');
    }

    public function user()
    {
        return $this->belongsTo(model_user::class, 'id_pengguna');
    }
}
