<?php

namespace App\Utilities;

use Symfony\Component\HttpFoundation\Response;

class StatusCodes
{
    const OK = Response::HTTP_OK;

    const BAD_REQUEST = Response::HTTP_BAD_REQUEST;

    const UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;

    const FORBIDDEN = Response::HTTP_FORBIDDEN;

    const NOT_FOUND = Response::HTTP_NOT_FOUND;

    const METHOD_NOT_ALLOW = Response::HTTP_METHOD_NOT_ALLOWED;

    const INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;

    const MAINTAINANCE = Response::HTTP_SERVICE_UNAVAILABLE;

    const FORCE_UPDATE = 526;

    const NORMAL_UPDATE = 524;
}
