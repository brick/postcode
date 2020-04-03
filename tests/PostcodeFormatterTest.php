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
    public function testFormatUnknownCountry() : void
    {
        $formatter = new PostcodeFormatter();
        $formatter->format('XX', '');
    }

    /**
     * @dataProvider providerFormatInvalidPostcode
     * @expectedException \Brick\Postcode\InvalidPostcodeException
     *
     * @param string $country
     * @param string $postcode
     *
     * @return void
     */
    public function testFormatInvalidPostcode(string $country, string $postcode) : void
    {
        $formatter = new PostcodeFormatter();
        $formatter->format($country, $postcode);
    }

    /**
     * @return void
     */
    public function testFormatterIsNotSupportedCountry() : void
    {
        $formatter = new PostcodeFormatter();
        $this->assertFalse($formatter->isSupportedCountry('UnknownCountry'));
    }

    /**
     * @return void
     */
    public function testFormatterIsSupportedCountry() : void
    {
        $formatter = new PostcodeFormatter();
        $this->assertTrue($formatter->isSupportedCountry('FR'));
    }

    /**
     * @return array
     */
    public function providerFormatInvalidPostcode() : array
    {
        return [
            ['FR', ''],
            ['FR', '123456'],
            ['GB', 'ABCDEFG'],
            ['PL', '12*345'],
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
        $formatter = new PostcodeFormatter();

        $this->assertSame($expectedOutput, $formatter->format($country, $postcode, true));
    }

    /**
     * @return array
     */
    public function providerFormat() : array
    {
        return [
            ['GB', 'WC2E9RZ', 'WC2E 9RZ'],
            ['GB', 'wc-2E9RZ', 'WC2E 9RZ'],
            ['PL', '12345', '12-345']
        ];
    }
}
