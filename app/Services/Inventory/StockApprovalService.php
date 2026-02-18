<?php

namespace App\Services\Inventory;

use App\Models\Inventory\StockRequest;
use Exception;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class StockApprovalService
{
    public function approval(int $request, string $action, int $approved)
    {
        return DB::transaction(function () use ($action, $request, $approved) {
            $data = StockRequest::lockForUpdate()->findOrFail($request);

            if ($data->status !== 'PENDING') {
                throw new Exception('Request already processed');
            }

            if ($action === 'APPROVE') {
                app(StockMovementService::class)->execute([
                    'product_id' => $data->product_id,
                    'type' => $data->request_type,
                    'quantity' => $data->quantity,
                    'executed_by' => $approved,
                    'references_type' => 'STOCK_REQUEST',
                    'references_id' => $data->id,
                    'note' => $data->note,
                ]);

                $data->update([
                    'status' => 'APPROVED',
                    'approved_by' => $approved,
                    'approved_at' => now()
                ]);
            } elseif ($action === 'REJECT') {
                $data->update([
                    'status' => 'REJECTED',
                    'approved_by' => $approved,
                    'approved_at' => now()
                ]);
            } else {
                throw new Exception('Invalid action');
            }

            return $data;
        });
    }
}
