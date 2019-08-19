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

        foreach ($configurationValues as $configurationKey => $configurationValue) {
            $configuration->{$configurationKey} = $configurationValue;
        }

        return $configuration;
    }
}
