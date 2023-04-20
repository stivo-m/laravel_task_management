<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Used to ensure we have consistency in our requests and responses.
     * @param $data
     * @param int $status
     * @param string $message
     * @return JsonResponse
     */
    public function makeResponse(
        $data = [],
        int   $status = 200,
        string $message = 'Request successful'
    ): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
