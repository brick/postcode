<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\KYFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the KY postcode formatter.
 */
class KYFormatterTest extends CountryPostcodeFormatterTest
{
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new KYFormatter();
    }

    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],

            ['KY01234', null],
            ['KY12345', 'KY1-2345'],
            ['KY23456', 'KY2-3456'],
            ['KY34567', 'KY3-4567'],
            ['KY45678', null],
            ['KYX1234', null],
            ['KX12345', null],
            ['XY12345', null],
            ['KKY1234', null],
            ['KKY12345', null],
            ['KY1234', null],
            ['KY123456', null],
        ];
    }
}
