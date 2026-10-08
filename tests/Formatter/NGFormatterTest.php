<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\NGFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the NG postcode formatter.
 */
class NGFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
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
            ['ABCDEFG', null],

            ['EK01A03FK01', 'EK-01-A03-FK-01'],
            ['FC03B06AG12', 'FC-03-B06-AG-12'],
            ['LA99ZZZTC99', 'LA-99-ZZZ-TC-99'],
            ['EK00A03FK01', null],
            ['EK01A03FK00', null],
            ['EK01A03FK1', null],
            ['EK01A03FK011', null],
            ['E101A03FK01', null],
            ['EKA1A03FK01', null],
            ['EK01A03F101', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new NGFormatter();
    }
}
