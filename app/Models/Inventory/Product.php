<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'inven_product';

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id');
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class, 'product_id');
    }

    public function stockRequests()
    {
        return $this->hasMany(StockRequest::class, 'product_id');
    }
}
