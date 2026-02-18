<?php

use App\Http\Controllers\Inventory\ApprovalController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Authentication\AuthLoginController;
use App\Http\Controllers\Authentication\AuthLogoutController;
use App\Http\Controllers\Authentication\AuthRegisController;
use App\Http\Controllers\Inventory\StockMovementController;
use App\Http\Controllers\Inventory\StockRequestController;

Route::post('/login', [AuthLoginController::class, 'login']);

Route::post('/regis', [AuthRegisController::class, 'regis']);

Route::middleware('auth:api')->group(function () {
    Route::post('/stock-request', [StockRequestController::class, 'store']);

    Route::post('/stock-request/{id}/approve', [ApprovalController::class, 'approve']);

    Route::post('/stock-movement', [StockMovementController::class, 'store']);

    Route::post('/logout', [AuthLogoutController::class, 'logout']);
});
