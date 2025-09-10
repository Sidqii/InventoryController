<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\AppPengajuan;
use App\Models\AppRiwayatStatus;
use App\Models\AppUsers;

class AppLoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $data = AppUsers::where('email', $request->email)->first();

            if (!$data || !Hash::check($request->password, $data->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Email atau Password salah',
                ], 401);
            }

            return response()->json([
                'status' => 200,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
