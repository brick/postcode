<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\CAFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the CA postcode formatter.
 */
class CAFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new CAFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],
            ['A', null],
            ['A1', null],
            ['A1B', null],
            ['A1B2', null],
            ['A1B2C', null],
            ['A1B2C3', 'A1B 2C3'],
            ['A1B2C3A', null],
            ['1A1B2C3', null],

            ['11A1A1', null],
            ['AAA1A1', null],
            ['A111A1', null],
            ['A1AAA1', null],
            ['A1A111', null],
            ['A1A1AA', null],

            ['A1A1A1', 'A1A 1A1'],
            ['A1A1B1', 'A1A 1B1'],
            ['A1A1C1', 'A1A 1C1'],
            ['A1A1D1', null],
            ['A1A1E1', 'A1A 1E1'],
            ['A1A1F1', null],
            ['A1A1G1', 'A1A 1G1'],
            ['A1A1H1', 'A1A 1H1'],
            ['A1A1I1', null],
            ['A1A1J1', 'A1A 1J1'],
            ['A1A1K1', 'A1A 1K1'],
            ['A1A1L1', 'A1A 1L1'],
            ['A1A1M1', 'A1A 1M1'],
            ['A1A1N1', 'A1A 1N1'],
            ['A1A1O1', null],
            ['A1A1P1', 'A1A 1P1'],
            ['A1A1Q1', null],
            ['A1A1R1', 'A1A 1R1'],
            ['A1A1S1', 'A1A 1S1'],
            ['A1A1T1', 'A1A 1T1'],
            ['A1A1U1', null],
            ['A1A1V1', 'A1A 1V1'],
            ['A1A1W1', 'A1A 1W1'],
            ['A1A1X1', 'A1A 1X1'],
            ['A1A1Y1', 'A1A 1Y1'],
            ['A1A1Z1', 'A1A 1Z1'],

            ['A1B1A1', 'A1B 1A1'],
            ['A1C1A1', 'A1C 1A1'],
            ['A1D1A1', null],
            ['A1E1A1', 'A1E 1A1'],
            ['A1F1A1', null],
            ['A1G1A1', 'A1G 1A1'],
            ['A1H1A1', 'A1H 1A1'],
            ['A1I1A1', null],
            ['A1J1A1', 'A1J 1A1'],
            ['A1K1A1', 'A1K 1A1'],
            ['A1L1A1', 'A1L 1A1'],
            ['A1M1A1', 'A1M 1A1'],
            ['A1N1A1', 'A1N 1A1'],
            ['A1O1A1', null],
            ['A1P1A1', 'A1P 1A1'],
            ['A1Q1A1', null],
            ['A1R1A1', 'A1R 1A1'],
            ['A1S1A1', 'A1S 1A1'],
            ['A1T1A1', 'A1T 1A1'],
            ['A1U1A1', null],
            ['A1V1A1', 'A1V 1A1'],
            ['A1W1A1', 'A1W 1A1'],
            ['A1X1A1', 'A1X 1A1'],
            ['A1Y1A1', 'A1Y 1A1'],
            ['A1Z1A1', 'A1Z 1A1'],

            ['B1A1A1', 'B1A 1A1'],
            ['C1A1A1', 'C1A 1A1'],
            ['D1A1A1', null],
            ['E1A1A1', 'E1A 1A1'],
            ['F1A1A1', null],
            ['G1A1A1', 'G1A 1A1'],
            ['H1A1A1', 'H1A 1A1'],
            ['I1A1A1', null],
            ['J1A1A1', 'J1A 1A1'],
            ['K1A1A1', 'K1A 1A1'],
            ['L1A1A1', 'L1A 1A1'],
            ['M1A1A1', 'M1A 1A1'],
            ['N1A1A1', 'N1A 1A1'],
            ['O1A1A1', null],
            ['P1A1A1', 'P1A 1A1'],
            ['Q1A1A1', null],
            ['R1A1A1', 'R1A 1A1'],
            ['S1A1A1', 'S1A 1A1'],
            ['T1A1A1', 'T1A 1A1'],
            ['U1A1A1', null],
            ['V1A1A1', 'V1A 1A1'],
            ['W1A1A1', null],
            ['X1A1A1', 'X1A 1A1'],
            ['Y1A1A1', 'Y1A 1A1'],
            ['Z1A1A1', null],
        ];
    }
}
