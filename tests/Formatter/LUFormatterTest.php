<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\LUFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the LU postcode formatter.
 */
class LUFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', '1234'],
            ['12345', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],

            ['L8084', '8084'],
            ['X8084', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new LUFormatter();
    }
}
