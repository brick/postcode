<?php

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\Tests\CountryTest;
use Brick\Postcode\Formatter\FR;

/**
 * Unit tests for the FR postcode formatter.
 */
class FRTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return new FR();
    }

    /**
     * {@inheritdoc}
     */
    public function postcodeProvider()
    {
        return [
            ['', null],

            ['1', null],
            ['12', null],
            ['123', null],
            ['12345', '12345'],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null]
        ];
    }
}
