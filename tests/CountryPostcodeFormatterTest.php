<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\CountryPostcodeFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Base class for individual country postcode formatter tests.
 */
abstract class CountryPostcodeFormatterTest extends TestCase
{
    /**
     * @dataProvider providerFormat
     *
     * @param string      $input
     * @param string|null $expectedOutput
     *
     * @return void
     */
    public function testFormat(string $input, ?string $expectedOutput) : void
    {
        $this->assertSame($expectedOutput, $this->getFormatter()->format($input));
    }

    /**
     * @return CountryPostcodeFormatter
     */
    abstract protected function getFormatter() : CountryPostcodeFormatter;

    /**
     * @return array
     */
    abstract public function providerFormat() : array;
}
