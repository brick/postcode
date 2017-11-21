<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\PostcodeFormatter;

use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class PostcodeFormatter.
 */
class PostcodeFormatterTest extends TestCase
{
    /**
     * @expectedException \Brick\Postcode\UnknownCountryException
     *
     * @return void
     */
    public function testIsValidWithUnknownCountryThrowsException() : void
    {
        (new PostcodeFormatter())->isValidPostcode('XX', '');
    }

    /**
     * @expectedException \Brick\Postcode\UnknownCountryException
     *
     * @return void
     */
    public function testFormatWithUnknownCountryThrowsException() : void
    {
        (new PostcodeFormatter())->formatPostcode('XX', '');
    }

    /**
     * @dataProvider providerIsValid
     *
     * @param string $country
     * @param string $postcode
     * @param bool   $isValid
     *
     * @return void
     */
    public function testIsValid(string $country, string $postcode, bool $isValid) : void
    {
        $this->assertSame($isValid, (new PostcodeFormatter())->isValidPostcode($country, $postcode));
    }

    /**
     * @return array
     */
    public function providerIsValid() : array
    {
        return [
            ['GB', '', false],
            ['GB', ' - WC 2E - 9RZ - ', true],
            ['PL', '', false],
            ['PL', '*12*345*', true]
        ];
    }

    /**
     * @dataProvider providerFormat
     *
     * @param string $country
     * @param string $postcode
     * @param string $expectedOutput
     *
     * @return void
     */
    public function testFormat(string $country, string $postcode, string $expectedOutput) : void
    {
        $this->assertSame($expectedOutput, ((new PostcodeFormatter())->formatPostcode($country, $postcode)));
    }

    /**
     * @return array
     */
    public function providerFormat() : array
    {
        return [
            ['GB', ' - WC 2E - 9RZ - ', 'WC2E 9RZ'],
            ['PL', '*12*345*', '12-345']
        ];
    }

    /**
     * @expectedException \Brick\Postcode\InvalidPostcodeException
     * @expectedExceptionMessage Invalid postcode: ABC
     *
     * @return void
     */
    public function testFormatWithInvalidPostcodeThrowsException() : void
    {
        (new PostcodeFormatter())->formatPostcode('GB', 'ABC');
    }
}
