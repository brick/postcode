<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\FKFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the FK postcode formatter.
 */
class FKFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new FKFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1234567', null],
            ['FIQQ1ZX', null],
            ['FIQQ1ZZ', 'FIQQ 1ZZ'],
            ['AIQQ1ZZ', null],
            ['FIQQ1ZZA', null],
        ];
    }
}
