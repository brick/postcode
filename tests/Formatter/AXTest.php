<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\AXFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the AX postcode formatter.
 */
class AXTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new AXFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerPostcode() : array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],

            ['AB22222', null],
            ['AX22222', 'AX-22222'],

            ['22345', '22345'],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null]
        ];
    }
}
