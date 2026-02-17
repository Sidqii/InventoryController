<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseJson;
use App\Http\Resources\UserResource;
use App\Services\Authentication\AuthRegisService;
use App\Http\Requests\Authentication\RegistrationRequest;

class AuthRegisController extends Controller
{
    public function regis(RegistrationRequest $request, AuthRegisService $service)
    {
        try {
            $data = $service->register($request->validated());

            return ResponseJson::success([
                'success' => true,
                'data' => new UserResource($data)
            ]);
        } catch (\Throwable $th) {
            return ResponseJson::fromThrowable($th);
        }
    }
}
