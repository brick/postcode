<?php

namespace Brick\Postcode\Tests;

use Brick\Postcode\PostcodeFormatter;

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class PostcodeFormatter.
 */
class PostcodeFormatterTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsValidWithUnknownCountryThrowsException()
    {
        (new PostcodeFormatter())->isValidPostcode('XX', '');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFormatWithUnknownCountryThrowsException()
    {
        (new PostcodeFormatter())->formatPostcode('XX', '');
    }

    /**
     * @dataProvider isValidProvider
     *
     * @param string  $country
     * @param string  $postcode
     * @param boolean $isValid
     */
    public function testIsValid($country, $postcode, $isValid)
    {
        $this->assertSame($isValid, ((new PostcodeFormatter())->isValidPostcode($country, $postcode)));
    }

    /**
     * @return array
     */
    public function isValidProvider()
    {
        return [
            ['GB', '', false],
            ['GB', ' - WC 2E - 9RZ - ', true],
            ['PL', '', false],
            ['PL', '*12*345*', true]
        ];
    }

    /**
     * @dataProvider formatProvider
     *
     * @param string $country
     * @param string $postcode
     * @param string $expectedOutput
     */
    public function testFormat($country, $postcode, $expectedOutput)
    {
        $this->assertSame($expectedOutput, ((new PostcodeFormatter())->formatPostcode($country, $postcode)));
    }

    /**
     * @return array
     */
    public function formatProvider()
    {
        return [
            ['GB', ' - WC 2E - 9RZ - ', 'WC2E 9RZ'],
            ['PL', '*12*345*', '12-345']
        ];
    }

    /**
     * @expectedException \Brick\Postcode\InvalidPostcodeException
     */
    public function testFormatWithInvalidPostcodeThrowsException()
    {
        (new PostcodeFormatter())->formatPostcode('GB', '');
    }
}
