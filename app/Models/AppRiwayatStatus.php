<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRiwayatStatus extends Model
{
    /** @use HasFactory<\Database\Factories\AppRiwayatStatusFactory> */
    use HasFactory;

    protected $table = 'app_riwayat_status';

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    protected $fillable = [
        'id_unit_barang',
        'id_pengajuan',
        'status_awal',
        'status_baru',
        'lokasi_unit',
        'oleh',
        'tanggal',
        'catatan',
    ];

    public function unitBarang()
    {
        return $this->belongsTo(AppUnitBarang::class, 'id_unit_barang');
    }


    public function statusAwal()
    {
        return $this->belongsTo(AppStatusUnit::class, 'status_awal');
    }

    public function statusBaru()
    {
        return $this->belongsTo(AppStatusUnit::class, 'status_baru');
    }

    public function lokasiUnit()
    {
        return $this->belongsTo(AppLokasi::class, 'lokasi_unit');
    }

    public function pengajuan()
    {
        return $this->belongsTo(AppPengajuan::class, 'id_pengajuan');
    }
}
