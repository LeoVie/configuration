<?php

namespace LeoVie\Configuration\Exception;

use Exception;

final class ImmutableException extends Exception
{
    public function __construct(string $methodName, string $allowedClassName)
    {
        $message = "Method '$methodName' can only get called from '$allowedClassName'.";

        parent::__construct($message);
    }
}