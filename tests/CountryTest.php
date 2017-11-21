<?php

namespace Brick\Postcode\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Base class for individual country postcode formatter tests.
 */
abstract class CountryTest extends TestCase
{
    /**
     * @dataProvider postcodeProvider
     *
     * @param string      $input
     * @param string|null $expectedOutput
     */
    public function testPostcode($input, $expectedOutput)
    {
        $this->assertSame($expectedOutput, $this->getFormatter()->format($input));
    }

    /**
     * @return \Brick\Postcode\CountryPostcodeFormatter
     */
    abstract public function getFormatter();

    /**
     * @return array
     */
    abstract public function postcodeProvider();
}
