<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\CountryPostcodeFormatter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Base class for individual country postcode formatter tests.
 */
abstract class CountryPostcodeFormatterTest extends TestCase
{
    #[DataProvider('providerFormat')]
    public function testFormat(string $input, ?string $expectedOutput): void
    {
        self::assertSame($expectedOutput, $this->getFormatter()->format($input));
    }

    abstract public static function providerFormat(): array;

    abstract protected function getFormatter(): CountryPostcodeFormatter;
}
