<?php

namespace App\Http\Controllers;

use App\Models\AppRolesPermissions;
use Illuminate\Http\Request;

class AppRolesPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppRolesPermissions::all();

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppRolesPermissions::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppRolesPermissions $appRolesPermissions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppRolesPermissions $appRolesPermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppRolesPermissions $appRolesPermissions)
    {
        //
    }
}
