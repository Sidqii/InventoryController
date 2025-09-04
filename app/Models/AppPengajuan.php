<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppPengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\AppPengajuanFactory> */
    use HasFactory;

    protected $table = 'app_pengajuan';

    protected $fillable = [
        'id_pengguna',
        'id_status',
        'instansi',
        'hal',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah',
    ];

    public function unitBarang()
    {
        return $this->belongsToMany(AppUnitBarang::class, 'app_pengajuan_unit', 'id_pengajuan', 'id_unit_barang');
    }

    public function user()
    {
        return $this->belongsTo(AppUsers::class, 'id_pengguna');
    }

    public function status()
    {
        return $this->belongsTo(AppStatus::class, 'id_status');
    }

    public function riwayat()
    {
        return $this->hasMany(AppRiwayatStatus::class, 'id_pengajuan');
    }
}
