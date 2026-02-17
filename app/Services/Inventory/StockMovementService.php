<?php

namespace App\Services\Inventory;

use App\Models\Inventory\Inventory;
use App\Models\Inventory\StockMovement;
use Exception;
use Illuminate\Support\Facades\DB;

class StockMovementService
{
    public function execute(array $data)
    {
        return DB::transaction(function () use ($data) {
            $productId = $data['product_id'];
            $type = $data['type'];
            $quantity = $data['quantity'];
            $executedBy = $data['executed_by'];
            $referencesType = $data['references_type'];
            $referencesId = $data['references_id'];
            $note = $data['note'];

            $inventory = Inventory::where('product_id', $productId)->lockForUpdate()->first();

            if (!$inventory) {
                $inventory = Inventory::create([
                    'product_id' => $productId,
                    'quantity' => 0,
                ]);
            }

            $currentStock = $inventory->quantity;

            switch ($type) {
                case 'IN':
                    $newStock = $currentStock + $quantity;
                    break;


                case 'OUT':
                    if ($currentStock < $quantity) {
                        throw new Exception('Insufficient stock');
                    }

                    $newStock = $currentStock - $quantity;
                    break;

                case 'ADJUST':
                    $newStock = $currentStock + $quantity;
                    break;

                default:
                    throw new Exception('Invalid stock movement type');
            }

            $movement = StockMovement::create([
                'product_id' => $productId,
                'executed_by' => $executedBy,
                'type' => $type,
                'quantity' => $quantity,
                'references_type' => $referencesType,
                'references_id' => $referencesId,
                'note' => $note
            ]);

            $inventory->update([
                'quantity' => $newStock
            ]);

            return $movement;
        });
    }
}
