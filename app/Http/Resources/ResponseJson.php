<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;

class ResponseJson
{
    public static function success(array $payload = [], int $status = 200): JsonResponse
    {
        return response()->json(
            array_merge(['success' => true], $payload),
            $status
        );
    }

    public static function error($message = 'Server Error', int $status = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $status);
    }

    public static function fromThrowable(\Throwable $th): JsonResponse
    {
        $status = $th->getCode();

        if (!is_int($status) || $status < 100) {
            $status = 500;
        }

        return self::error($th->getMessage(), $status);
    }
}
