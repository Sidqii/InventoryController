<?php

namespace App\Http\Controllers;

use App\Models\AppKepemilikan;
use Illuminate\Http\Request;

class AppKepemilikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppKepemilikan::all();

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
        $data = AppKepemilikan::create($request->all());

        return response()->json([
            'message' => 'Kepemilikan berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppKepemilikan::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppKepemilikan $appKepemilikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppKepemilikan $appKepemilikan)
    {
        $appKepemilikan->update($request->all());

        return response()->json([
            'message' => 'Kepemilikan berhasil diperbarui',
            'data' => $appKepemilikan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppKepemilikan $appKepemilikan)
    {
        $appKepemilikan->delete();

        return response()->json([
            'message' => 'Kepemilikan berhasil dihapus',
            'data' => $appKepemilikan,
        ]);
    }
}
