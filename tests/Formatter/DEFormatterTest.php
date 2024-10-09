<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\DEFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the DE postcode formatter.
 */
class DEFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new DEFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', '12345'],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],

            // invalid
            ['010101', null],
            ['000000', null],
            ['(123456)', null],
            ['!23456', null],
            ['412345', null],
            ['567890', null],
            ['4A1234', null],
            ['132045', null],
            ['00001', null],
            ['05234', null],
            ['62000', null],
            ['43000', null],

            // valid
            ['01234','01234'],
            ['04123','04123'],
            ['06123','06123'],
            ['07123', '07123'],
            ['08123', '08123'],
            ['09123', '09123'],
            ['18888', '18888'],
            ['38888', '38888'],
            ['58888', '58888'],
            ['78888', '78888'],
            ['88888', '88888'],
            ['99999', '99999'],
            ['40123', '40123'],
            ['42123', '42123'],
            ['44123', '44123'],
            ['46123', '46123'],
            ['47123', '47123'],
            ['48123', '48123'],
            ['49123', '49123'],
            ['60123', '60123'],
            ['61123', '61123'],
            ['63123', '63123'],
            ['64123', '64123'],
            ['65123', '65123'],
            ['66123', '66123'],
            ['67123', '67123'],
            ['68123', '68123'],
            ['69123', '69123'],

        ];
    }
}
