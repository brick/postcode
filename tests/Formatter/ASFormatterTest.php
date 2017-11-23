<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\ASFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the AS postcode formatter.
 */
class ASFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new ASFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['12345', null],
            ['96799', '96799'],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', null],
            ['967991234', '96799-1234'],
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
            ['ABCDEFGHIJK', null]
        ];
    }
}
