<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'success' => true,
            'message' => new UserResource(Auth::guard('api')->user())
        ]);
    }
}
