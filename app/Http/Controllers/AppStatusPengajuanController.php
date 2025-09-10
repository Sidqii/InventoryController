<?php

namespace App\Http\Controllers;

use App\Models\AppStatus;
use App\Models\AppStatusPengajuan;
use Illuminate\Http\Request;

class AppStatusPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppStatusPengajuan::all();

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
        $data = AppStatusPengajuan::create($request->all());

        return response()->json([
            'message' => 'Status berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppStatusPengajuan::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppStatusPengajuan $appStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppStatusPengajuan $appStatus)
    {
        $appStatus->update($request->all());

        return response()->json([
            'message' => 'Status berhasil diperbarui',
            'data' => $appStatus,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppStatusPengajuan $appStatus)
    {
        $appStatus->delete();

        return response()->json([
            'message' => 'Status berhasil dihapus',
            'data' => $appStatus,
        ]);
    }
}
