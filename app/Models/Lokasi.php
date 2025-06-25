<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'app_lokasi';

    protected $fillable = [
        'nama_lokasi',
        'kode_lokasi',
        'keterangan',
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_lokasi');
    }
}
