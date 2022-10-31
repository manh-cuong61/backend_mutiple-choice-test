<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use App\Traits\ApiResponser;
use App\Utilities\StatusCodes;
use Closure;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenBlacklistedException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class VerifyJWTToken
{
    use ApiResponser;

    /**
     * The JWT Authenticator.
     */
    protected JWTAuth $auth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        try {
            $this->auth->parseToken()->authenticate();
        } catch (TokenBlacklistedException $e) {
            throw new CustomException(__('messages.errors.E0001'), errorCode: 'E0001', statusCode: StatusCodes::UNAUTHORIZED);
        } catch (TokenExpiredException $e) {
            throw new CustomException(__('messages.errors.E0002'), errorCode: 'E0002', statusCode: StatusCodes::UNAUTHORIZED);
        } catch (TokenInvalidException $e) {
            throw new CustomException(__('messages.errors.E0003'), errorCode: 'E0003', statusCode: StatusCodes::UNAUTHORIZED);
        } catch (JWTException $e) {
            throw new CustomException(__('messages.errors.E0004'), errorCode: 'E0004', statusCode: StatusCodes::UNAUTHORIZED);
        }

        return $next($request);
    }
}
