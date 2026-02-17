<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class, 'product_id', 'product_id');
    }
}
