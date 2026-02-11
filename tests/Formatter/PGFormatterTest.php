<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\PGFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the PG postcode formatter.
 */
class PGFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', '123'],
            ['1234', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new PGFormatter();
    }
}
