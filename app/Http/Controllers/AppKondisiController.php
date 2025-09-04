<?php

namespace App\Http\Controllers;

use App\Models\AppKondisi;
use Illuminate\Http\Request;

class AppKondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppKondisi::all();

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
        $data = AppKondisi::create($request->all());

        return response()->json([
            'message' => 'Kondisi berhasil ditambah',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppKondisi::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppKondisi $appKondisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppKondisi $appKondisi)
    {
        $appKondisi->update($request->all());

        return response()->json([
            'message' => 'Kondisi berhasil diperbarui',
            'data' => $appKondisi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppKondisi $appKondisi)
    {
        $appKondisi->delete();

        return response()->json([
            'message' => 'Kondisi berhasil dihapus',
            'data' => $appKondisi,
        ]);
    }
}
