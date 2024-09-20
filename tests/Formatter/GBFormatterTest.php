<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GBFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the GB postcode formatter.
 */
class GBFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new GBFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['A', null],

            ['12', null],
            ['1A', null],
            ['A1', null],
            ['AB', null],

            ['123', null],
            ['12A', null],
            ['1A2', null],
            ['1AB', null],
            ['A12', null],
            ['A1B', null],
            ['AB1', null],
            ['ABC', null],

            ['1234', null],
            ['123A', null],
            ['12A3', null],
            ['12AB', null],
            ['1A23', null],
            ['1A2B', null],
            ['1AB2', null],
            ['1ABC', null],
            ['A123', null],
            ['A12B', null],
            ['A1B2', null],
            ['A1BC', null],
            ['AB12', null],
            ['AB1C', null],
            ['ABC1', null],
            ['ABCD', null],

            ['12345', null],
            ['1234A', null],
            ['123A4', null],
            ['123AB', null],
            ['12A34', null],
            ['12A3B', null],
            ['12AB3', null],
            ['12ABC', null],
            ['1A234', null],
            ['1A23B', null],
            ['1A2B3', null],
            ['1A2BC', null],
            ['1AB23', null],
            ['1AB2C', null],
            ['1ABC2', null],
            ['1ABCD', null],
            ['A1234', null],
            ['A123B', null],
            ['A12B3', null],
            ['A12BC', null],
            ['A12BA', null],
            ['B12BA', 'B1 2BA'],
            ['A1B23', null],
            ['A1B2C', null],
            ['A1BC2', null],
            ['A1BCD', null],
            ['AB123', null],
            ['AB12C', null],
            ['AB1C2', null],
            ['AB1CD', null],
            ['ABC12', null],
            ['ABC1D', null],
            ['ABCD1', null],
            ['ABCDE', null],

            ['123456', null],
            ['12345A', null],
            ['1234A5', null],
            ['1234AB', null],
            ['123A45', null],
            ['123A4B', null],
            ['123AB4', null],
            ['123ABC', null],
            ['12A345', null],
            ['12A34B', null],
            ['12A3B4', null],
            ['12A3BC', null],
            ['12AB34', null],
            ['12AB3C', null],
            ['12ABC3', null],
            ['12ABCD', null],
            ['1A2345', null],
            ['1A234B', null],
            ['1A23B4', null],
            ['1A23BC', null],
            ['1A2B34', null],
            ['1A2B3C', null],
            ['1A2BC3', null],
            ['1A2BCD', null],
            ['1AB234', null],
            ['1AB23C', null],
            ['1AB2C3', null],
            ['1AB2CD', null],
            ['1ABC23', null],
            ['1ABC2D', null],
            ['1ABCD2', null],
            ['1ABCDE', null],
            ['A12345', null],
            ['A1234B', null],
            ['A123B4', null],
            ['A123BC', null],
            ['A123BD', null],
            ['W123BD', 'W12 3BD'],
            ['A12B34', null],
            ['A12B3C', null],
            ['A12BC3', null],
            ['A12BCD', null],
            ['A1B234', null],
            ['A1B23C', null],
            ['A1B2C3', null],
            ['A1B2CD', null],
            ['A1B2DD', null],
            ['E1B2DD', 'E1B 2DD'],
            ['A1BC23', null],
            ['A1BC2D', null],
            ['A1BCD2', null],
            ['A1BCDE', null],
            ['AB1234', null],
            ['AB123C', null],
            ['AB12C3', null],
            ['AB12CD', 'AB1 2CD'],
            ['AB12DD', 'AB1 2DD'],
            ['AB1C23', null],
            ['AB1C2D', null],
            ['AB1CD2', null],
            ['AB1CDE', null],
            ['ABC123', null],
            ['ABC12D', null],
            ['ABC1D2', null],
            ['ABC1DE', null],
            ['ABCD12', null],
            ['ABCD1E', null],
            ['ABCDE1', null],
            ['ABCDEF', null],

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
            ['A12B345', null],
            ['A12B34C', null],
            ['A12B3C4', null],
            ['A12B3CD', null],
            ['A12BC34', null],
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
            ['AB123CD', 'AB12 3CD'],
            ['AB123DD', 'AB12 3DD'],
            ['AB12C34', null],
            ['AB12C3D', null],
            ['AB12CD3', null],
            ['AB12CDE', null],
            ['AB1C234', null],
            ['AB1C23D', null],
            ['AB1C2D3', null],
            ['AB1C2DE', null],
            ['AB1B2DE', 'AB1B 2DE'],
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

            ['WC2E9RZ', 'WC2E 9RZ'],
            ['W1A9RZ', 'W1A 9RZ'],

            // QVX cannot appear in the 1st position of the outward code
            ['QC2E9RZ', null],
            ['VC2E9RZ', null],
            ['XC2E9RZ', null],

            // IJZ cannot appear in the 2nd position of the outward code
            ['WI2E9RZ', null],
            ['WJ2E9RZ', null],
            ['WZ2E9RZ', null],

            // only ABCDEFGHJKPSTUW can appear in the 3rd position of the outward code
            ['W1I9RZ', null],
            ['W1L9RZ', null],
            ['W1M9RZ', null],
            ['W1N9RZ', null],
            ['W1O9RZ', null],
            ['W1Q9RZ', null],
            ['W1R9RZ', null],
            ['W1V9RZ', null],
            ['W1X9RZ', null],
            ['W1Y9RZ', null],
            ['W1Z9RZ', null],

            // only ABEHMNPRVWXY can appear in the 4th position of the outward code
            ['WC2C9RZ', null],
            ['WC2D9RZ', null],
            ['WC2F9RZ', null],
            ['WC2G9RZ', null],
            ['WC2I9RZ', null],
            ['WC2J9RZ', null],
            ['WC2K9RZ', null],
            ['WC2L9RZ', null],
            ['WC2O9RZ', null],
            ['WC2Q9RZ', null],
            ['WC2S9RZ', null],
            ['WC2T9RZ', null],
            ['WC2U9RZ', null],
            ['WC2Z9RZ', null],

            // Special case
            ['GIR0AA', 'GIR 0AA'],
            ['GIR0AB', null],

            ['9AB123CD', null],
            ['XAB1C2DE', null],
            ['AB123CD4', null],
            ['AB1C2DEF', null],
        ];
    }
}
