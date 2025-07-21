<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_riwayat_status extends Model
{
    use HasFactory;

    protected $table = 'app_riwayat_status';

    protected $fillable = [
        'id_unit_barang',
        'id_jenis_perubahan',
        'status_awal',
        'status_baru',
        'lokasi_awal',
        'lokasi_baru',
        'tanggal',
        'oleh',
        'catatan',
        'lampiran',
        'id_pengajuan',
    ];

    public function unit()
    {
        return $this->belongsTo(model_unitbarang::class, 'id_unit_barang');
    }

    public function pengajuan()
    {
        return $this->belongsTo(model_pengajuan::class, 'id_pengajuan');
    }

    public function jenis()
    {
        return $this->belongsTo(model_jenis_perubahan::class, 'id_jenis_perubahan');
    }

    public function statusAwal()
    {
        return $this->belongsTo(model_status::class, 'status_awal');
    }

    public function statusBaru()
    {
        return $this->belongsTo(model_status::class, 'status_baru');
    }

    public function lokasiAwal()
    {
        return $this->belongsTo(model_lokasi::class, 'lokasi_awal');
    }

    public function lokasiBaru()
    {
        return $this->belongsTo(model_lokasi::class, 'lokasi_baru');
    }

    public function user()
    {
        return $this->belongsTo(model_user::class, 'oleh', 'id'); // asumsinya "oleh" adalah ID user
    }

}
