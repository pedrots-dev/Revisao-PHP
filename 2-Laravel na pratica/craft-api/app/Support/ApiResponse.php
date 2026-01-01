<?php
namespace App\Support;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse{
    public static function ok(mixed $data = null, array $meta = [], int $status = 200):JsonResponse {

        return response()->json([
            'success' => true,
            'data' => $data,
            'meta' => (object) $meta,
        ], $status);
    }


    public static function error(string $code, string $message, mixed $details = null, int $status = 400):JsonResponse {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $code,
                'message' => $message,
                'details' => $details,
            ],
        ], $status);
    }

}
?>
