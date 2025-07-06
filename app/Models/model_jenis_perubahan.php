<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_jenis_perubahan extends Model
{
    use HasFactory;

    protected $table = 'app_jenis_perubahan';

    protected $fillable = [
        'kode',
        'label',
    ];
}
