<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'inven_category';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
