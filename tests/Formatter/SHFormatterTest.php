<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\SHFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the SH postcode formatter.
 */
class SHFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new SHFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1234567', null],

            ['STHL1ZX', null],
            ['STHL1ZZ', 'STHL 1ZZ'],
            ['ASTHL1ZZ', null],
            ['STHL1ZZA', null],

            ['ASCN1ZX', null],
            ['ASCN1ZZ', 'ASCN 1ZZ'],
            ['AASCN1ZZ', null],
            ['ASCN1ZZA', null],

            ['TDCU1ZX', null],
            ['TDCU1ZZ', 'TDCU 1ZZ'],
            ['ATDCU1ZZ', null],
            ['TDCU1ZZA', null],
        ];
    }
}
