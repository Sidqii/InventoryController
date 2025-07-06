<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_status extends Model
{
    use HasFactory;

    protected $table = 'app_status';

    protected $fillable = ['status'];
}
