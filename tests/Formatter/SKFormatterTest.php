<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\SKFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the SK postcode formatter.
 */
class SKFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['0', null],
            ['01', null],
            ['012', null],
            ['0123', null],
            ['01234', '012 34'],
            ['12345', null],
            ['79999', null],
            ['80000', '800 00'],
            ['99999', '999 99'],
            ['12345', null],
            ['60200', null],
            ['012345', null],

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
        return new SKFormatter();
    }
}
