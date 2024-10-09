<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\InvalidPostcodeException;
use Brick\Postcode\PostcodeFormatter;
use Brick\Postcode\UnknownCountryException;
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
        $formatter = new PostcodeFormatter();
        try {
            $result = $formatter->format($this->getCountry(), $input);
        } catch (InvalidPostcodeException $e) {
            $result = null;
        }
        $this->assertSame($expectedOutput, $result);
    }

    /**
     * Returns the test associated Country ISO2 code
     *
     * @return string
     */
    public function getCountry() : string
    {
        return substr((new \ReflectionClass($this))->getShortName(), 0, 2);
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
