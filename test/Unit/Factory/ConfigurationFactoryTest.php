<?php

namespace LeoVie\Configuration\Test\Unit\Factory;

use LeoVie\Configuration\Factory\ConfigurationFactory;
use PHPUnit\Framework\TestCase;

class ConfigurationFactoryTest extends TestCase
{
    public function test_createConfiguration_returnsExpected(): void
    {
        $configuration = ConfigurationFactory::createConfiguration(__DIR__ . '/../../testdata/Unit/Factory/ConfigurationFactory/configuration.yml');

        $expectedProperties = [
            'foo' => 'bar',
            'bar' => 'foo',
            'baz' => [
                'foo',
                'bar'
            ],
        ];

        $actualProperties = [
            'foo' => $configuration->foo,
            'bar' => $configuration->bar,
            'baz'=> $configuration->baz
        ];

        self::assertEquals($expectedProperties, $actualProperties);
    }
}
