<?php

namespace App\Models\Inventory;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StockRequest extends Model
{
    protected $table = 'stock_request';

    protected $fillable = [
        'product_id',
        'requester_id',
        'request_type',
        'quantity',
        'status',
        'note',
        'approved_by',
        'approved_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
