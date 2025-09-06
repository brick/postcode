<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\PNFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the PN postcode formatter.
 */
class PNFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1234567', null],
            ['PCRN1ZX', null],
            ['PCRN1ZZ', 'PCRN 1ZZ'],
            ['APCRN1ZZ', null],
            ['PCRN1ZZA', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new PNFormatter();
    }
}
