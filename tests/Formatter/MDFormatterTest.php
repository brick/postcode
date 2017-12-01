<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\MDFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the MD postcode formatter.
 */
class MDFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new MDFormatter();
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
            ['1234', 'MD-1234'],
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

            ['MD', null],
            ['MD1', null],
            ['MD12', null],
            ['MD123', null],
            ['MD1234', 'MD-1234'],
            ['MD12345', null],
            ['XMD1234', null],
            ['XD1234', null],
            ['MX1234', null],
            ['MDX123', null],
            ['M1234', null],
            ['D1234', null],
        ];
    }
}
