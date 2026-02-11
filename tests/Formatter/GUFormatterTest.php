<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GUFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the GU postcode formatter.
 */
class GUFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['12345', null],
            ['96909', null],
            ['96910', '96910'],
            ['96932', '96932'],
            ['96933', null],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', null],
            ['969090000', null],
            ['969101234', '96910-1234'],
            ['969329999', '96932-9999'],
            ['969330000', null],
            ['1234567890', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],
            ['ABCDEFGH', null],
            ['ABCDEFGHI', null],
            ['ABCDEFGHIJK', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new GUFormatter();
    }
}
