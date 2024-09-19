<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\LCFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the LC postcode formatter.
 */
class LCFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new LCFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['LC12345', 'LC12 345'],

            ['LC1234', null],
            ['LX12345', null],
            ['XC12345', null],
            ['XLC12345', null],
            ['LC123456', null],

            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],
            ['1234567', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],
        ];
    }
}
