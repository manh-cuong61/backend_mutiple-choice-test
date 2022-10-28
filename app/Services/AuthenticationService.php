<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Utilities\StatusCodes;

class AuthenticationService
{
    public function authenticate($credentials, $remember = false): string
    {
        if ($remember) {
            config(['jwt.ttl' => env('TOKEN_TTL_REMEMBER_ME', 1800)]);
        }
        $token = auth()->attempt($credentials);

        if (!$token) {
            throw new CustomException(__('messages.errors.E9996'), errorCode: 'E9996', statusCode: StatusCodes::UNAUTHORIZED);
        }

        return $token;
    }
}
