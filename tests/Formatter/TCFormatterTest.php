<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\TCFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the TC postcode formatter.
 */
class TCFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new TCFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1234567', null],
            ['TKCA0ZZ', null],
            ['TKCA1ZZ', 'TKCA 1ZZ'],
            ['TKCA1AB', null],
            ['ATKCA1ZZ', null],
            ['TKCA1ZZA', null],
        ];
    }
}
