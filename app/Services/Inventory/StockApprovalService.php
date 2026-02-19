<?php

namespace App\Services\Inventory;

use App\Models\Inventory\StockRequest;
use App\Models\User;
use App\Services\Authorization\AuthorizationService;
use Exception;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class StockApprovalService
{
    protected AuthorizationService $authorizationService;

    public function __construct(AuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    public function approval(int $request, string $action, User $user)
    {
        $this->authorizationService->authorize($user, 'update_item');

        return DB::transaction(function () use ($action, $request, $user) {
            $data = StockRequest::lockForUpdate()->findOrFail($request);

            if ($data->status !== 'PENDING') {
                throw new Exception('Request already processed');
            }

            if ($action === 'APPROVE') {
                app(StockMovementService::class)->execute([
                    'product_id' => $data->product_id,
                    'type' => $data->request_type,
                    'quantity' => $data->quantity,
                    'executed_by' => $user->id,
                    'references_type' => 'STOCK_REQUEST',
                    'references_id' => $data->id,
                    'note' => $data->note,
                ]);

                $data->update([
                    'status' => 'APPROVED',
                    'approved_by' => $user->id,
                    'approved_at' => now()
                ]);
            } elseif ($action === 'REJECT') {
                $data->update([
                    'status' => 'REJECTED',
                    'approved_by' => $user->id,
                    'approved_at' => now()
                ]);
            } else {
                throw new Exception('Invalid action');
            }

            return $data;
        });
    }
}
