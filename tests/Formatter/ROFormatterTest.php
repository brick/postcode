<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\ROFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the RO postcode formatter.
 */
class ROFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new ROFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', '123456'],
            ['1234567', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],

            // valid
            ['123-456', '123456'],
            ['  123456 ', '123456'],
            ['010101', '010101'],
            ['123456', '123456'],
            ['090123', '090123'],
            ['080456', '080456'],
            ['070789', '070789'],
            ['123450', '123450'],
            ['012345', '012345'],
            ['202020', '202020'],
            ['999999', '999999'],

            // invalid
            ['000123', null],
            ['01111', null],
            ['000000', null],
            ['-1234', null],
            ['12ABCD', null],
            ['12345678', null],
            ['01 234 56', null],
            ['0300!', null],
            ['999999', null],
            ['12 345', null],
            ['07-089', null]

        ];
    }
}
