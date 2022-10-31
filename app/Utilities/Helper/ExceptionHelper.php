<?php

namespace App\Utilities\Helper;

use App\Utilities\StatusCodes;

class ExceptionHelper
{
    public static function getErrorInfo(int $statusCode): array
    {
        switch ($statusCode) {
            case StatusCodes::NOT_FOUND:
                $errorCode = 'E9994';
                $message = __('messages.errors.E9994');
                break;
            case StatusCodes::MAINTAINANCE:
                $errorCode = 'E9995';
                $message = __('messages.errors.E9995');
                break;
            case StatusCodes::UNAUTHORIZED:
                $errorCode = 'E9995';
                $message = __('messages.errors.E9996');
                break;
            case StatusCodes::FORBIDDEN:
                $errorCode = 'E9997';
                $message = __('messages.errors.E9997');
                break;
            case StatusCodes::METHOD_NOT_ALLOW:
                $errorCode = 'E9998';
                $message = __('messages.errors.E9998');
                break;
            case StatusCodes::INTERNAL_SERVER_ERROR:
                $errorCode = 'E9999';
                $message = __('messages.errors.E9999');
                break;
            default:
                $errorCode = 'E9992';
                $message = __('messages.errors.E9992');
        }

        return [
            'error_code' => $errorCode,
            'message' => $message,
        ];
    }
}
