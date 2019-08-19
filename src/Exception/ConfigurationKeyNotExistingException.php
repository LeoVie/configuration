<?php

namespace LeoVie\Configuration\Exception;

use Exception;

final class ConfigurationKeyNotExistingException extends Exception
{
    public function __construct(string $configurationKey)
    {
        $message = "Configuration key '$configurationKey' does not exist.";

        parent::__construct($message);
    }
}