<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'app_kondisi';

    protected $fillable = [
        'kondisi'
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_kondisi');
    }
}
