<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\LTFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the LT postcode formatter.
 */
class LTFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', '12345'],
            ['123456', null],

            ['AB12345', null],
            ['LT12345', 'LT-12345'],
            ['LX12345', null],
            ['XT12345', null],
            ['XLT12345', null],
            ['LTX12345', null],
            ['LTX1234', null],
            ['LT1234', null],
            ['LT123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new LTFormatter();
    }
}
