<?php

namespace App\Http\Controllers;

use App\Models\AppPengajuanUnit;
use Illuminate\Http\Request;

class AppPengajuanUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppPengajuanUnit::all();

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
        $data = AppPengajuanUnit::all()->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppPengajuanUnit $appPengajuanUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppPengajuanUnit $appPengajuanUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppPengajuanUnit $appPengajuanUnit)
    {
        //
    }
}
