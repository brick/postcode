<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\IOFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the IO postcode formatter.
 */
class IOFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1234567', null],
            ['BBND1ZX', null],
            ['BBND1ZZ', 'BBND 1ZZ'],
            ['ABBND1ZZ', null],
            ['BBND1ZZA', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new IOFormatter();
    }
}
