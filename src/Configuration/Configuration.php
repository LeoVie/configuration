<?php

namespace LeoVie\Configuration\Configuration;

use LeoVie\Configuration\Exception\ConfigurationKeyNotExistingException;
use LeoVie\Configuration\Exception\ImmutableException;
use LeoVie\Configuration\Factory\ConfigurationFactory;

final class Configuration
{
    private $configurationEntries = [];

    /**
     * @throws ImmutableException
     */
    public function __set(string $name, $value): void
    {
        $callerClass = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2)[1]['class'];
        if ($callerClass !== ConfigurationFactory::class) {
            throw new ImmutableException(__FUNCTION__, ConfigurationFactory::class);
        }

        $this->configurationEntries[$name] = $value;
    }

    public function __get(string $name)
    {
        if (!key_exists($name, $this->configurationEntries)) {
            throw new ConfigurationKeyNotExistingException($name);
        }

        return $this->configurationEntries[$name];
    }
}