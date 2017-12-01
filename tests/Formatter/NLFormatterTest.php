<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\NLFormatter;
use Brick\Postcode\Tests\CountryPostcodeFormatterTest;

/**
 * Unit tests for the NL postcode formatter.
 */
class NLFormatterTest extends CountryPostcodeFormatterTest
{
    /**
     * {@inheritdoc}
     */
    protected function getFormatter() : CountryPostcodeFormatter
    {
        return new NLFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerFormat() : array
    {
        return [
            ['', null],

            ['1234AB', '1234 AB'],
            ['1234SS', null],
            ['1234SD', null],
            ['1234SA', null],
            ['12345AB', null],
            ['123AB', null],
            ['123ABC', null],
            ['1234ABC', null],
            ['1234AB1', null],
            ['1234ABC', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['1234', null],
            ['12345', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],
        ];
    }
}
