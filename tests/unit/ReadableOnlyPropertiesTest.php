<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use ReadableOnlyProperties\Exceptions\PropertyIsReadOnlyException;
use ReadableOnlyProperties\ReadableOnlyProperties;

/**
 * Dummy User class for testing purposes
 */
class DummyUser
{
    use ReadableOnlyProperties;

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

final class ReadableOnlyPropertiesTest extends TestCase
{
    public function test_it_allows_to_access_private_property(): void
    {
        $dummyUser = new DummyUser('Chris');

        $actualName = $dummyUser->name;
        $expectedName = 'Chris';

        self::assertEquals($expectedName, $actualName);
    }

    public function test_it_throws_exception_when_mutating_a_property(): void
    {
        $dummyUser = new DummyUser('Chris');

        $this->expectException(PropertyIsReadOnlyException::class);
        $this->expectExceptionMessage('Property name is read only');

        $dummyUser->name = 'Agnes';
    }
}
