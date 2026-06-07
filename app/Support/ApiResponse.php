<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = [], ?string $message = null, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $statusCode);
    }

    public static function error(string $message, $data = [], int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => empty($data) ? new \stdClass() : $data,
            'message' => $message
        ], $statusCode);
    }
}
