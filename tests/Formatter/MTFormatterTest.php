<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\MTFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the MT postcode formatter.
 */
class MTFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['ABC1234', 'ABC 1234'],
            ['ABC12345', null],
            ['ABCD123', null],
            ['ABCD1234', null],

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
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new MTFormatter();
    }
}
