<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\SMFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the SM postcode formatter.
 */
class SMFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['47889', null],
            ['47890', '47890'],
            ['47891', '47891'],
            ['47898', '47898'],
            ['47899', '47899'],
            ['47900', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new SMFormatter();
    }
}
