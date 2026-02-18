<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseJson;
use App\Services\Inventory\StockApprovalService;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approve(int $id, Request $request, StockApprovalService $service)
    {
        try {
            $approved = $service->approval(
                $id,
                $request->action,
                request()->user()->id
            );

            return ResponseJson::success([
                $approved
            ]);
        } catch (\Throwable $th) {
            return ResponseJson::fromThrowable($th);
        }
    }
}
