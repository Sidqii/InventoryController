<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class roleCtrl extends Controller
{
    public function index()
    {
        return response()->json(Role::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $role = Role::create($data);
        return response()->json(['message' => 'Role berhasil ditambahkan', 'data' => $role]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update($data);

        return response()->json(['message' => 'Role berhasil diperbarui', 'data' => $role]);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role berhasil dihapus']);
    }
}
