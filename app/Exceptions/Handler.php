<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use App\Utilities\Helper\ExceptionHelper;
use App\Utilities\StatusCodes;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            $statusCode = $exception->getStatusCode();
            $errorCode = $exception->getErrorCode();
            $errors = $exception->getErrors();
            $message = $exception->getMessage();
        } else {
            $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : StatusCodes::BAD_REQUEST;
            $data = ExceptionHelper::getErrorInfo($statusCode);
            $errorCode = $data['error_code'];
            $message = $data['message'];
            $errors = [];
        }

        if ($errors) {
            return $this->validationErrorResponse($errors, $errorCode, $message, $statusCode);
        } else {
            return $this->errorResponse($errorCode, $message, $statusCode);
        }
    }
}
