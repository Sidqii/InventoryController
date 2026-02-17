<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseJson;
use Illuminate\Support\Facades\Auth;

class AuthLogoutController extends Controller
{
    public function __invoke()
    {
        Auth::guard('api')->logout();

        return ResponseJson::success([
            'success' => true,
            'message' => 'Logout successfully'
        ]);
    }
}
