<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\JEFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the JE postcode formatter.
 */
class JEFormatterTest extends CountryPostcodeFormatterTest
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
            ['123456', null],
            ['1234567', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],

            ['JE123', null],
            ['JE12A', null],
            ['JE1A2', null],
            ['JE1AB', null],
            ['JEA12', null],
            ['JEA1B', null],
            ['JEAB1', null],
            ['JEABC', null],

            ['JE12AB', 'JE1 2AB'],
            ['JE12AB3', null],
            ['JE12ABC', null],
            ['9JE12AB', null],
            ['XJE12AB', null],
            ['XX12AB', null],

            ['JE1234', null],
            ['JE123A', null],
            ['JE12A3', null],
            ['JE1A23', null],
            ['JE1A2B', null],
            ['JE1AB2', null],
            ['JE1ABC', null],
            ['JEA123', null],
            ['JEA12B', null],
            ['JEA1B2', null],
            ['JEA1BC', null],
            ['JEAB12', null],
            ['JEAB1C', null],
            ['JEABC1', null],
            ['JEABCD', null],

            ['JE123AB', 'JE12 3AB'],
            ['JE123AB4', null],
            ['JE123ABC', null],
            ['9JE123AB', null],
            ['XJE123AB', null],
            ['XX123AB', null],

            ['JE12345', null],
            ['JE1234A', null],
            ['JE123A4', null],
            ['JE12A34', null],
            ['JE12A3B', null],
            ['JE12AB3', null],
            ['JE12ABC', null],
            ['JE1A234', null],
            ['JE1A23B', null],
            ['JE1A2B3', null],
            ['JE1A2BC', null],
            ['JE1AB23', null],
            ['JE1AB2C', null],
            ['JE1ABC2', null],
            ['JE1ABCD', null],
            ['JEA1234', null],
            ['JEA123B', null],
            ['JEA12B3', null],
            ['JEA12BC', null],
            ['JEA1B23', null],
            ['JEA1B2C', null],
            ['JEA1BC2', null],
            ['JEA1BCD', null],
            ['JEAB123', null],
            ['JEAB12C', null],
            ['JEAB1C2', null],
            ['JEAB1CD', null],
            ['JEABC12', null],
            ['JEABC1D', null],
            ['JEABCD1', null],
            ['JEABCDE', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new JEFormatter();
    }
}
