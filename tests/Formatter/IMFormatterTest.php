<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\IMFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the IM postcode formatter.
 */
class IMFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new IMFormatter();
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
            ['123456', null],
            ['1234567', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],

            ['IM123', null],
            ['IM12A', null],
            ['IM1A2', null],
            ['IM1AB', null],
            ['IMA12', null],
            ['IMA1B', null],
            ['IMAB1', null],
            ['IMABC', null],

            ['IM12AB', 'IM1 2AB'],
            ['IM12AB3', null],
            ['IM12ABC', null],
            ['9IM12AB', null],
            ['XIM12AB', null],
            ['XX12AB', null],

            ['IM1234', null],
            ['IM123A', null],
            ['IM12A3', null],
            ['IM1A23', null],
            ['IM1A2B', null],
            ['IM1AB2', null],
            ['IM1ABC', null],
            ['IMA123', null],
            ['IMA12B', null],
            ['IMA1B2', null],
            ['IMA1BC', null],
            ['IMAB12', null],
            ['IMAB1C', null],
            ['IMABC1', null],
            ['IMABCD', null],

            ['IM123AB', 'IM12 3AB'],
            ['IM123AB4', null],
            ['IM123ABC', null],
            ['9IM123AB', null],
            ['XIM123AB', null],
            ['XX123AB', null],

            ['IM12345', null],
            ['IM1234A', null],
            ['IM123A4', null],
            ['IM12A34', null],
            ['IM12A3B', null],
            ['IM12AB3', null],
            ['IM12ABC', null],
            ['IM1A234', null],
            ['IM1A23B', null],
            ['IM1A2B3', null],
            ['IM1A2BC', null],
            ['IM1AB23', null],
            ['IM1AB2C', null],
            ['IM1ABC2', null],
            ['IM1ABCD', null],
            ['IMA1234', null],
            ['IMA123B', null],
            ['IMA12B3', null],
            ['IMA12BC', null],
            ['IMA1B23', null],
            ['IMA1B2C', null],
            ['IMA1BC2', null],
            ['IMA1BCD', null],
            ['IMAB123', null],
            ['IMAB12C', null],
            ['IMAB1C2', null],
            ['IMAB1CD', null],
            ['IMABC12', null],
            ['IMABC1D', null],
            ['IMABCD1', null],
            ['IMABCDE', null],
        ];
    }
}
