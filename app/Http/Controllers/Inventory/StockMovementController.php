<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StockMovementRequest;
use App\Http\Resources\ResponseJson;
use App\Services\Inventory\StockMovementService;

class StockMovementController extends Controller
{
    public function store(StockMovementRequest $request, StockMovementService $service)
    {
        try {
            $data = $request->validated();

            $data['executed_by'] = $request->user()->id;

            $movement = $service->execute($data);

            return ResponseJson::success([
                'data' => $movement
            ]);
        } catch (\Throwable $th) {
            return ResponseJson::fromThrowable($th);
        }
    }
}
