<?php

namespace LeoVie\Configuration\Test\Unit\Exception;

use LeoVie\Configuration\Exception\ImmutableException;
use PHPUnit\Framework\TestCase;

class ImmutableExceptionTest extends TestCase
{
    public function test_message_containsExpected(): void
    {
        $methodName = 'fancyMethod';
        $allowedClassName = 'CoolClass';

        try {
            throw new ImmutableException($methodName, $allowedClassName);
        } catch (\Exception $exception) {
            $exceptionMessage = $exception->getMessage();
        }

        self::assertStringContainsString($methodName, $exceptionMessage);
        self::assertStringContainsString($allowedClassName, $exceptionMessage);
    }
}