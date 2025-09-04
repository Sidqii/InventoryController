<?php

namespace App\Http\Controllers;

use App\Models\AppLokasi;
use Illuminate\Http\Request;

class AppLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppLokasi::all();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = AppLokasi::create($request->all());

        return response()->json([
            'message' => 'Lokasi berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppLokasi::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppLokasi $appLokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppLokasi $appLokasi)
    {
        $appLokasi->update($request->all());

        return response()->json([
            'message' => 'Lokasi berhasil diperbarui',
            'data' => $appLokasi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppLokasi $appLokasi)
    {
        $appLokasi->delete();

        return response()->json([
            'message' => 'Lokasi berhasil dihapus',
            'data' => $appLokasi,
        ]);
    }
}
