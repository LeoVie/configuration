<?php

namespace LeoVie\Configuration\Factory;

use LeoVie\Configuration\Configuration\Configuration;
use Symfony\Component\Yaml\Yaml;

class ConfigurationFactory
{
    public static function createConfiguration(string $configurationYmlPath): Configuration
    {
        $configurationValues = Yaml::parseFile($configurationYmlPath);

        $configuration = new Configuration();

        $configuration = self::assignConfigurationValuesToConfiguration($configurationValues, $configuration);

        return $configuration;
    }

    private static function assignConfigurationValuesToConfiguration(array $configurationValues, Configuration $configuration): Configuration
    {
        foreach ($configurationValues as $configurationKey => $configurationValue) {
            $configuration->{$configurationKey} = $configurationValue;
        }

        return $configuration;
    }
}
