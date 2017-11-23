<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\AZFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the AZ postcode formatter.
 */
class AZTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new AZFormatter();
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
            ['1234', 'AZ 1234'],
            ['12345', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],

            ['AZ', null],
            ['AZ1', null],
            ['AZ123', null],
            ['AZ1234', 'AZ 1234'],
            ['AZ12345', null],
            ['XAZ1234', null],
        ];
    }
}
