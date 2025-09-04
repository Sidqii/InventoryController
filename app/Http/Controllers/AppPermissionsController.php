<?php

namespace App\Http\Controllers;

use App\Models\AppPermissions;
use Illuminate\Http\Request;

class AppPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppPermissions::with('roles')->get();

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
        $data = AppPermissions::create($request->all());

        return response()->json([
            'message' => 'Akses berhasil ditambah',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppPermissions::with('roles')->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppPermissions $appPermissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppPermissions $appPermissions)
    {
        $appPermissions->update($request->all());

        return response()->json([
            'message' => 'Akses berhasil diperbarui',
            'data' => $appPermissions,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppPermissions $appPermissions)
    {
        $appPermissions->delete();

        return response()->json([
            'message' => 'Akses berhasil dihapus',
            'data' => $appPermissions,
        ]);
    }
}
