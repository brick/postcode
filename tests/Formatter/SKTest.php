<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\SKFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the SK postcode formatter.
 */
class SKTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new SKFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerPostcode() : array
    {
        return [
            ['', null],

            ['0', null],
            ['01', null],
            ['012', null],
            ['0123', null],
            ['01234', '012 34'],
            ['12345', null],
            ['60200', null],
            ['012345', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null]
        ];
    }
}
