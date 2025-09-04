<?php

namespace App\Http\Controllers;

use App\Models\AppRoles;
use Illuminate\Http\Request;

class AppRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppRoles::with([
            'user',
            'permissions'
        ])->get();

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
        $data = AppRoles::create($request->all());

        return response()->json([
            'message' => 'Peran berhasil ditambah',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppRoles::with([
            'user',
            'permissions'
        ])->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppRoles $appRoles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppRoles $appRoles)
    {
        $appRoles->update($request->all());

        return response()->json([
            'message' => 'Peran berhasil diperbarui',
            'data' => $appRoles,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppRoles $appRoles)
    {
        $appRoles->delete();

        return response()->json([
            'message' => 'Peran berhasil dihapus',
            'data' => $appRoles,
        ]);
    }
}
