<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\MPFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the MP postcode formatter.
 */
class MPFormatterTest extends CountryPostcodeFormatterTest
{
    public static function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['12345', null],
            ['96949', null],
            ['96950', '96950'],
            ['96951', '96951'],
            ['96952', '96952'],
            ['96953', null],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', null],
            ['969490000', null],
            ['969501234', '96950-1234'],
            ['969529999', '96952-9999'],
            ['969530000', null],
            ['1234567890', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
            ['ABCDEFG', null],
            ['ABCDEFGH', null],
            ['ABCDEFGHI', null],
            ['ABCDEFGHIJK', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new MPFormatter();
    }
}
