<?php

namespace App\Ship\LegacyBridge\Testing\Exceptions;

use Apiato\Core\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;

final class UndefinedMethodException extends HttpException
{
    public static function create(int|null $statusCode = null, string|null $message = null): self
    {
        return new self($statusCode ?? Response::HTTP_FORBIDDEN, $message ?? 'Undefined HTTP Verb!');
    }
}
