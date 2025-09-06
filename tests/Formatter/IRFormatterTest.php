<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\IRFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the IR postcode formatter.
 */
class IRFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['012', null],
            ['123', null],
            ['1234', null],
            ['01234', null],
            ['12345', null],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', null],
            ['1234567890', '12345 67890'],
            ['12345678901', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],
            ['ABCDEFGH', null],
            ['ABCDEFGHI', null],
            ['ABCDEFGHIJ', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new IRFormatter();
    }
}
