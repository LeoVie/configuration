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
        $callerClass = $this->getCallerClass();
        $wasCalledFromConfigurationFactory = ($callerClass === ConfigurationFactory::class);
        if (!$wasCalledFromConfigurationFactory) {
            throw new ImmutableException(__FUNCTION__, ConfigurationFactory::class);
        }

        $this->configurationEntries[$name] = $value;
    }

    private function getCallerClass(): string
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        $callerClass = $backtrace[2]['class'];
        return $callerClass;
    }

    /**
     * @throws ConfigurationKeyNotExistingException
     */
    public function __get(string $name)
    {
        if (!key_exists($name, $this->configurationEntries)) {
            throw new ConfigurationKeyNotExistingException($name);
        }

        return $this->configurationEntries[$name];
    }
}