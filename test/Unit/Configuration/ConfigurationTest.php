<?php

namespace LeoVie\Configuration\Test\Unit\Configuration;

use LeoVie\Configuration\Configuration\Configuration;
use LeoVie\Configuration\Exception\ConfigurationKeyNotExistingException;
use LeoVie\Configuration\Exception\ImmutableException;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function test_configurationProperties_areImmutable(): void
    {
        $configuration = new Configuration();

        self::expectException(ImmutableException::class);

        $configuration->foo = 'bar';
    }

    public function test_get_throwsIfConfigurationKeyDoesNotExist(): void
    {
        $configuration = new Configuration();

        self::expectException(ConfigurationKeyNotExistingException::class);

        $configuration->foo;
    }
}