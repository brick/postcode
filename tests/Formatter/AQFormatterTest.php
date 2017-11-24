<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\AQFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the AQ postcode formatter.
 */
class AQFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new AQFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1234567', null],
            ['BIQQ1ZX', null],
            ['BIQQ1ZZ', 'BIQQ 1ZZ'],
            ['ABIQQ1ZZ', null],
            ['BIQQ1ZZA', null],
        ];
    }
}
