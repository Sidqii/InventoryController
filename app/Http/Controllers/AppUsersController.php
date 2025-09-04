<?php

namespace App\Http\Controllers;

use App\Models\AppUsers;
use Illuminate\Http\Request;

class AppUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AppUsers::with([
            'roles',
            'pengajuan'
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
        //fungsi untuk melakukan register
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|min:6',
        ]);

        $data = AppUsers::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'id_peran' => 5, //id untuk staff
        ]);

        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AppUsers::with([
            'roles',
            'pengajuan'
        ])->findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppUsers $appUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppUsers $appUsers)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:app_users,email' . $appUsers->id,
            'id_peran' => 'sometimes|required|exists:app_roles,id',
            'password' => 'nullable|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $appUsers->update($validated);

        return response()->json([
            'message' => 'User berhasil diperbarui',
            'data' => $appUsers->load('roles')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppUsers $appUsers)
    {
        $appUsers->delete();

        return response()->json([
            'message' => 'User berhasil dihapus',
            'data' => $appUsers,
        ]);
    }
}
