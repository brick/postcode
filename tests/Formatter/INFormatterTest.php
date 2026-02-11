<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\INFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the IN postcode formatter.
 */
class INFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['012', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['012345', null],
            ['123456', '123456'],
            ['999999', '999999'],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new INFormatter();
    }
}
