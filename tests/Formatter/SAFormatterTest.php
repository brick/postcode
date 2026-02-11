<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\SAFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the SA postcode formatter.
 */
class SAFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['12345', '12345'],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', '12345-6789'],
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
        return new SAFormatter();
    }
}
