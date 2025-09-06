<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\IDFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the ID postcode formatter.
 */
class IDFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['012', null],
            ['123', null],
            ['1234', null],
            ['01234', null],
            ['12345', '12345'],
            ['99999', '99999'],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new IDFormatter();
    }
}
