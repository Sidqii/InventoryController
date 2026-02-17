<?php

namespace App\Services\Inventory;

use App\Models\Inventory\StockRequest;

class StockRequestService
{
    public function createRequest(array $data, int $user)
    {
        return StockRequest::create([
            'product_id' => $data['product_id'],
            'requester_id' => $user,
            'request_type' => $data['request_type'],
            'status' => 'PENDING',
            'quantity' => $data['quantity'],
            'note' => $data['note'] ?? null,
        ]);
    }
}
