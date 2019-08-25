# LeoVie/configuration

## Introduction
With this small package you can optimize the process of integrating the usage of a
configuration yaml file in your project.

## Installation
Require this package in your project via composer:
```bash
composer require leovie/configuration
```

## Usage
1. Create a configuration yaml file anywhere in your project structure.
2. Fill it with the structure you need for your project
3. Call `$configuration = LeoVie\Configuration\ConfigurationFactory::createConfiguration();` 
with the path of your configuration yaml file as a parameter
4. Access your configuration values via `$configuration->yourConfigurationKey;`

## Advantages
* No need to create your own configuration class again and again in your projects
* Once instantiated, the configuration values are immutable, so you do not have
to worry about an inconsistent configuration