<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class statusCtrl extends Controller
{
    public function index()
    {
        return response()->json(Status::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
        ]);

        $status = Status::create($data);
        return response()->json(['message' => 'Status berhasil ditambahkan', 'data' => $status]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
        ]);

        $status = Status::findOrFail($id);
        $status->update($data);

        return response()->json(['message' => 'Status berhasil diperbarui', 'data' => $status]);
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json(['message' => 'Status berhasil dihapus']);
    }
}
