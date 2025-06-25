<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class riwayatCtrl extends Controller
{
    public function index()
    {
        return response()->json(Riwayat::with(['inventaris', 'user', 'status'])->latest('tanggal_proses')->get());
    }

    public function show($id)
    {
        return response()->json(Riwayat::with(['inventaris', 'user', 'status'])->findOrFail($id));
    }

    public function destroy($id)
    {
        $data = Riwayat::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Riwayat berhasil dihapus']);
    }
}
