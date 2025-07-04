<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'app_status';

    protected $fillable = [
        'status'
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_status');
    }
}
