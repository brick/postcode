<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\AUFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the AU postcode formatter.
 */
class AUTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new AUFormatter();
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
            ['1234', '1234'],
            ['12345', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null]
        ];
    }
}
