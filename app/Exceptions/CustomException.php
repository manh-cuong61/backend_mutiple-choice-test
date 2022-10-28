<?php

namespace App\Exceptions;

use App\Utilities\StatusCodes;
use Exception;
use Throwable;

class CustomException extends Exception
{
    protected string $errorCode;

    protected int $statusCode = 0;

    protected array $errors;

    public function __construct(string $message, int $code = 0, Throwable $previous = null, string $errorCode = 'E9999', array $errors = [], int $statusCode = StatusCodes::BAD_REQUEST)
    {
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
        $this->errors = $errors;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
