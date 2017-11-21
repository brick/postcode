<?php

namespace Brick\Postcode\Tests;

use Brick\Postcode\CountryPostcodeFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Base class for individual country postcode formatter tests.
 */
abstract class CountryTest extends TestCase
{
    /**
     * @dataProvider providerPostcode
     *
     * @param string      $input
     * @param string|null $expectedOutput
     *
     * @return void
     */
    public function testPostcode(string $input, ?string $expectedOutput) : void
    {
        $this->assertSame($expectedOutput, $this->getFormatter()->format($input));
    }

    /**
     * @return CountryPostcodeFormatter
     */
    abstract public function getFormatter() : CountryPostcodeFormatter;

    /**
     * @return array
     */
    abstract public function providerPostcode() : array;
}
