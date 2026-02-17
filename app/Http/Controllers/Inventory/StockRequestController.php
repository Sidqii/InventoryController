<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreProductRequest;
use App\Http\Resources\ResponseJson;
use App\Services\Inventory\StockRequestService;
use Illuminate\Http\Request;

class StockRequestController extends Controller
{
    public function store(StoreProductRequest $request, StockRequestService $service)
    {
        try {
            $stockRequest = $service->createRequest(
                $request->validated(),
                $request->user()->id
            );

            return ResponseJson::success([
                $stockRequest
            ]);
        } catch (\Throwable $th) {
            return ResponseJson::fromThrowable($th);
        }
    }
}
