<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GSFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the GS postcode formatter.
 */
class GSFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1234567', null],
            ['SIQQ0ZZ', null],
            ['SIQQ1ZZ', 'SIQQ 1ZZ'],
            ['SIQQ1AB', null],
            ['AIQQ1ZZ', null],
            ['SIQQ1ZZA', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new GSFormatter();
    }
}
