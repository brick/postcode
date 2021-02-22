<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\IEFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the IE postcode formatter.
 */
class IEFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new IEFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],
            ['12345678', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFGH', null],

            ['A12B3C4', 'A12 B3C4'],
            ['A12B3CD', 'A12 B3CD'],
            ['A12BC34', 'A12 BC34'],

            ['A1WB3C4', 'A1W B3C4'],
            ['A1WB3CD', 'A1W B3CD'],
            ['A1WBC34', 'A1W BC34'],

            ['A98F625', 'A98 F625'],

            ['A1XB3C4', null],
            ['A1XB3CD', null],
            ['A1XBC34', null],

            ['1234567', null],
            ['123456A', null],
            ['12345A6', null],
            ['12345AB', null],
            ['1234A56', null],
            ['1234A5B', null],
            ['1234AB5', null],
            ['1234ABC', null],
            ['123A456', null],
            ['123A45B', null],
            ['123A4B5', null],
            ['123A4BC', null],
            ['123AB45', null],
            ['123AB4C', null],
            ['123ABC4', null],
            ['123ABCD', null],
            ['12A3456', null],
            ['12A345B', null],
            ['12A34B5', null],
            ['12A34BC', null],
            ['12A3B45', null],
            ['12A3B4C', null],
            ['12A3BC4', null],
            ['12A3BCD', null],
            ['12AB345', null],
            ['12AB34C', null],
            ['12AB3C4', null],
            ['12AB3CD', null],
            ['12ABC34', null],
            ['12ABC3D', null],
            ['12ABCD3', null],
            ['12ABCDE', null],
            ['1A23456', null],
            ['1A2345B', null],
            ['1A234B5', null],
            ['1A234BC', null],
            ['1A23B45', null],
            ['1A23B4C', null],
            ['1A23BC4', null],
            ['1A23BCD', null],
            ['1A2B345', null],
            ['1A2B34C', null],
            ['1A2B3C4', null],
            ['1A2B3CD', null],
            ['1A2BC34', null],
            ['1A2BC3D', null],
            ['1A2BCD3', null],
            ['1A2BCDE', null],
            ['1AB2345', null],
            ['1AB234C', null],
            ['1AB23C4', null],
            ['1AB23CD', null],
            ['1AB2C34', null],
            ['1AB2C3D', null],
            ['1AB2CD3', null],
            ['1AB2CDE', null],
            ['1ABC234', null],
            ['1ABC23D', null],
            ['1ABC2D3', null],
            ['1ABC2DE', null],
            ['1ABCD23', null],
            ['1ABCD2E', null],
            ['1ABCDE2', null],
            ['1ABCDEF', null],
            ['A123456', null],
            ['A12345B', null],
            ['A1234B5', null],
            ['A1234BC', null],
            ['A123B45', null],
            ['A123B4C', null],
            ['A123BC4', null],
            ['A123BCD', null],
            ['A12B34C', null],
            ['A12BC3D', null],
            ['A12BCD3', null],
            ['A12BCDE', null],
            ['A1B2345', null],
            ['A1B234C', null],
            ['A1B23C4', null],
            ['A1B23CD', null],
            ['A1B2C34', null],
            ['A1B2C3D', null],
            ['A1B2CD3', null],
            ['A1B2CDE', null],
            ['A1BC234', null],
            ['A1BC23D', null],
            ['A1BC2D3', null],
            ['A1BC2DE', null],
            ['A1BCD23', null],
            ['A1BCD2E', null],
            ['A1BCDE2', null],
            ['A1BCDEF', null],
            ['AB12345', null],
            ['AB1234C', null],
            ['AB123C4', null],
            ['AB123CD', null],
            ['AB12C34', null],
            ['AB12C3D', null],
            ['AB12CD3', null],
            ['AB12CDE', null],
            ['AB1C234', null],
            ['AB1C23D', null],
            ['AB1C2D3', null],
            ['AB1C2DE', null],
            ['AB1CD23', null],
            ['AB1CD2E', null],
            ['AB1CDE2', null],
            ['AB1CDEF', null],
            ['ABC1234', null],
            ['ABC123D', null],
            ['ABC12D3', null],
            ['ABC12DE', null],
            ['ABC1D23', null],
            ['ABC1D2E', null],
            ['ABC1DE2', null],
            ['ABC1DEF', null],
            ['ABCD123', null],
            ['ABCD12E', null],
            ['ABCD1E2', null],
            ['ABCD1EF', null],
            ['ABCDE12', null],
            ['ABCDE1F', null],
            ['ABCDEF1', null],
            ['ABCDEFG', null],
        ];
    }
}
