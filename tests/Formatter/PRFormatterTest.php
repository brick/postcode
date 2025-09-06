<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\PRFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the PR postcode formatter.
 */
class PRFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['00599', null],
            ['00600', '00600'],
            ['00799', '00799'],
            ['00800', null],
            ['00899', null],
            ['00900', '00900'],
            ['00999', '00999'],
            ['01000', null],

            ['000600', null],
            ['006000', null],

            ['005991234', null],
            ['006001234', '00600-1234'],
            ['007991234', '00799-1234'],
            ['008001234', null],
            ['008991234', null],
            ['009001234', '00900-1234'],
            ['009991234', '00999-1234'],
            ['010001234', null],

            ['06001234', null],
            ['00600123', null],

            ['0006001234', null],
            ['0060012340', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],
            ['1234567', null],
            ['12345678', null],
            ['123456789', null],
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
            ['ABCDEFGHIJ', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new PRFormatter();
    }
}
