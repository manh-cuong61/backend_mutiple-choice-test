<?php

namespace App\Traits;

use App\Utilities\StatusCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponser
{
    /**
     * return success response with data
     */
    public function successResponse($data = null, ?string $message = null, int $code = StatusCodes::OK, $extra = null): JsonResponse
    {
        $response = ['data' => $data];

        if (isset($message)) {
            $response = [
                'messages' => [$message],
            ];

            $response = array_merge($response, $data);
        }

        if (isset($extra)) {
            $response = array_merge($response, $extra);
        }

        return response()->json($response, $code);
    }

    /**
     * return error response with no data
     */
    public function errorResponse($errorCode, $message, $code): JsonResponse
    {
        return response()->json([
            'error_code' => $errorCode,
            'message' => $message,
        ], $code);
    }

    /**
     * return resource response
     */
    public function resourceResponse(JsonResource $resource): JsonResponse
    {
        return $resource->response();
    }

    /**
     * return success response with no data
     */
    public function successStatusResponse(?string $message = ''): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
        ], StatusCodes::OK);
    }

    /**
     * return validation error response
     */
    public function validationErrorResponse(array $errors, string $errorCode = 'E9993', string $message = ''): JsonResponse
    {
        if ($message == '') {
            $message = __('messages.errors.E9993');
        }

        return response()->json([
            'error_code' => $errorCode,
            'message' => $message,
            'errors' => $errors,
        ], StatusCodes::BAD_REQUEST);
    }
}
