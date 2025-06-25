<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'app_kategori';

    protected $fillable = [
        'kategori'
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_kategori');
    }
}
