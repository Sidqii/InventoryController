<?php

namespace App\Http\Controllers;

use App\Models\AppJenis;
use Illuminate\Http\Request;

class AppJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppJenis::all();

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
        $data = AppJenis::create($request->all());

        return response()->json([
            'message' => 'Jenis berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppJenis::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppJenis $appJenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppJenis $appJenis)
    {
        $appJenis->update($request->all());

        return response()->json([
            'message' => 'Jenis berhasil diperbarui',
            'data' => $appJenis,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppJenis $appJenis)
    {
        $appJenis->delete();

        return response()->json([
            'message' => 'Jenis berhasil dihapus',
            'data' => $appJenis,
        ]);
    }
}
