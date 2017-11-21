<?php

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\Tests\CountryTest;
use Brick\Postcode\Formatter\RE;

/**
 * Unit tests for the FR postcode formatter.
 */
class RETest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return new RE();
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
            ['12345', null],
            ['123456', null],

            ['A', null],
            ['AB', null],
            ['ABC', null],
            ['ABCD', null],
            ['ABCDE', null],
            ['ABCDEF', null],

            ['97000', null],
            ['97400', '97400'],
            ['97412', '97412']
        ];
    }
}
