<?php

namespace App\Models\Inventory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $table = 'stock_movement';

    protected $fillable = [
        'product_id',
        'executed_by',
        'type',
        'quantity',
        'references_type',
        'references_id',
        'note',
    ];

    protected $hidden = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function executor()
    {
        return $this->belongsTo(User::class, 'executed_by');
    }
}
