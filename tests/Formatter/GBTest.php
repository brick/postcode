<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\GBFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the GB postcode formatter.
 */
class GBTest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new GBFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerPostcode() : array
    {
        return [
            ['', null],

            ['A9AAA', null],
            ['A9AA9', null],
            ['A9A9A', null],
            ['A9A99', null],
            ['A99A9', null],
            ['A999A', null],
            ['A9999', null],
            ['A99AA', 'A9 9AA'],
            ['a99aa', 'A9 9AA'],

            ['A9AAAA', null],
            ['A9AAA9', null],
            ['A9AA9A', null],
            ['A9AA99', null],
            ['A9A9A9', null],
            ['A9A99A', null],
            ['A9A999', null],
            ['A9A9AA', 'A9A 9AA'],
            ['a9a9aa', 'A9A 9AA'],

            ['A99AAA', null],
            ['A99AA9', null],
            ['A99A9A', null],
            ['A99A99', null],
            ['A999A9', null],
            ['A9999A', null],
            ['A99999', null],
            ['A999AA', 'A99 9AA'],
            ['a999aa', 'A99 9AA'],

            ['AA9AAA', null],
            ['AA9AA9', null],
            ['AA9A9A', null],
            ['AA9A99', null],
            ['AA99A9', null],
            ['AA999A', null],
            ['AA9999', null],
            ['AA99AA', 'AA9 9AA'],
            ['aa99aa', 'AA9 9AA'],

            ['AA9AAAA', null],
            ['AA9AAA9', null],
            ['AA9AA9A', null],
            ['AA9AA99', null],
            ['AA9A9A9', null],
            ['AA9A99A', null],
            ['AA9A999', null],
            ['AA9A9AA', 'AA9A 9AA'],
            ['aa9a9aa', 'AA9A 9AA'],

            ['AA99AAA', null],
            ['AA99AA9', null],
            ['AA99A9A', null],
            ['AA99A99', null],
            ['AA999A9', null],
            ['AA9999A', null],
            ['AA99999', null],
            ['AA999AA', 'AA99 9AA'],
            ['aa999aa', 'AA99 9AA'],

            ['WC2E7BN', 'WC2E 7BN']
        ];
    }
}
