<?php

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\Tests\CountryTest;
use Brick\Postcode\Formatter\PL;

/**
 * Unit tests for the PL postcode formatter.
 */
class PLTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return new PL();
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
            ['12345', '12-345'],
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
