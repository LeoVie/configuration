<?php

namespace LeoVie\Configuration\Test\Unit\Exception;

use LeoVie\Configuration\Exception\ConfigurationKeyNotExistingException;
use PHPUnit\Framework\TestCase;

class ConfigurationKeyNotExistingExceptionTest extends TestCase
{
    public function test_message_containsExpected(): void
    {
        $configurationKey = 'fancyKey';

        try {
            throw new ConfigurationKeyNotExistingException($configurationKey);
        } catch (\Exception $exception) {
            $exceptionMessage = $exception->getMessage();
        }

        self::assertStringContainsString($configurationKey, $exceptionMessage);
    }
}