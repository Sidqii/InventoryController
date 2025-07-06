<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\model_user;
use Hash;
use Illuminate\Http\Request;

class ctrl_login extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = model_user::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau Password salah'
            ], 404);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'status' => 200,
            'user_id' => $user->id,
            'role_id' => $user->role_id,
            'nama' => $user->nama,
        ], 200);
    }

    public function show($id)
    {
        $user = model_user::find($id);

        if (!$user) {
            return response()->json([
                'staus' => 404,
                'message' => 'User tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $user,
        ], 200);
    }
}
