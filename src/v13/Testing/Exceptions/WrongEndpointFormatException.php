<?php

namespace Apiato\LegacyBridge\v13\Testing\Exceptions;

use Apiato\Core\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;

final class WrongEndpointFormatException extends HttpException
{
    public static function create(int|null $statusCode = null, string|null $message = null): self
    {
        return new self($statusCode ?? Response::HTTP_INTERNAL_SERVER_ERROR, $message ?? 'tests ($this->endpoint) property must be formatted as "verb@url".');
    }
}
