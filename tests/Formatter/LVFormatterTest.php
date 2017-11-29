<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\LVFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the LV postcode formatter.
 */
class LVFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new LVFormatter();
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
            ['1234', 'LV-1234'],
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

            ['LV', null],
            ['LV1', null],
            ['LV12', null],
            ['LV123', null],
            ['LV1234', 'LV-1234'],
            ['LV12345', null],
            ['XLV1234', null],
            ['XV1234', null],
            ['LX1234', null],
            ['LVX123', null],
            ['L1234', null],
            ['V1234', null],
        ];
    }
}
