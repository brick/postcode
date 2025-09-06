<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GIFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the GI postcode formatter.
 */
class GIFormatterTest extends CountryPostcodeFormatterTest
{
    public function providerFormat(): array
    {
        return [
            ['', null],

            ['1234567', null],
            ['GX110AA', null],
            ['GX111AA', 'GX11 1AA'],
            ['GX111AB', null],
            ['AX111AA', null],
            ['GX111AAA', null],
        ];
    }

    protected function getFormatter(): CountryPostcodeFormatter
    {
        return new GIFormatter();
    }
}
