<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\CountryPostcodeFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Base class for individual country postcode formatter tests.
 */
abstract class CountryPostcodeFormatterTest extends TestCase
{
    /**
     * @dataProvider providerFormat
     */
    public function testFormat(string $input, ?string $expectedOutput): void
    {
        self::assertSame($expectedOutput, $this->getFormatter()->format($input));
    }

    abstract public function providerFormat(): array;

    abstract protected function getFormatter(): CountryPostcodeFormatter;
}
