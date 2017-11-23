<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\Formatter\AIFormatter;
use Brick\Postcode\Tests\CountryTest;

/**
 * Unit tests for the AI postcode formatter.
 */
class AITest extends CountryTest
{
    /**
     * {@inheritdoc}
     */
    public function getFormatter() : CountryPostcodeFormatter
    {
        return new AIFormatter();
    }

    /**
     * {@inheritdoc}
     */
    public function providerPostcode() : array
    {
        return [
            ['', 'AI-2640'],
            ['2640', 'AI-2640'],
            ['2641', null],
            ['AI', null],
            ['AB2650', null],
            ['AI2640', 'AI-2640'],
            ['AI2641', null],
            ['AI26401', null],
            ['0AI2640', null],
        ];
    }
}
