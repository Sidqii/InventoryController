<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\model_barang;

class ctrl_unit_ready extends Controller
{
    public function index()
    {
        $barang = model_barang::with(['kategori', 'jenis', 'unit_ready'])
            ->whereHas('unit_ready')
            ->get()
            ->map(function ($item) {
                $item->stok_tersedia = $item->unit_ready->count();
                unset($item->unit_ready);
                return $item;
            });

        return response()->json($barang);
    }
}
