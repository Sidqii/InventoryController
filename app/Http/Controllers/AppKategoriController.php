<?php

namespace App\Http\Controllers;

use App\Models\AppKategori;
use Illuminate\Http\Request;

class AppKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppKategori::all();

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
        $data = AppKategori::create($request->all());

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppKategori::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppKategori $appKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppKategori $appKategori)
    {
        $appKategori->update($request->all());

        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data' => $appKategori,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppKategori $appKategori)
    {
        $appKategori->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus',
            'data' => $appKategori,
        ]);
    }
}
