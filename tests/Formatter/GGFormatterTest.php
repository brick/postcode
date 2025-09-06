<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GGFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the GG postcode formatter.
 */
class GGFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['AA999AA', null],
            ['XY999AA', null],
            ['GX999AA', null],
            ['GY999AA', 'GY99 9AA'],
            ['GY123AB', 'GY12 3AB'],
            ['XGY123AB', null],
            ['GY123ABC', null],
            ['GY9999A', null],
            ['GY999A9', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new GGFormatter();
    }
}
