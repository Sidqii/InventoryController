<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\AuthenticationRequest;
use App\Http\Resources\ResponseJson;
use App\Http\Resources\UserResource;
use App\Services\Authentication\AuthLoginService;

class AuthLoginController extends Controller
{
    public function login(AuthenticationRequest $request, AuthLoginService $service)
    {
        try {
            $data = $service->credential(
                $request->only('email', 'password')
            );

            return ResponseJson::success([
                'token' => $data['token'],
                'user' => new UserResource($data['user'])
            ]);
        } catch (\Throwable $th) {
            return ResponseJson::fromThrowable($th);
        }
    }
}
