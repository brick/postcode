<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\VCFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the VC postcode formatter.
 */
class VCFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', 'VC1234'],
            ['12345', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],

            ['VC', null],
            ['VC1', null],
            ['VC123', null],
            ['VC1234', 'VC1234'],
            ['VX1234', null],
            ['XC1234', null],
            ['VC12345', null],
            ['XVC1234', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new VCFormatter();
    }
}
