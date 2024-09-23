<?php

declare(strict_types=1);

namespace Brick\Postcode\Tests;

use Brick\Postcode\InvalidPostcodeException;
use Brick\Postcode\PostcodeFormatter;

use Brick\Postcode\UnknownCountryException;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class PostcodeFormatter.
 */
class PostcodeFormatterTest extends TestCase
{
    public function testFormatUnknownCountry() : void
    {
        $formatter = new PostcodeFormatter();

        $this->expectException(UnknownCountryException::class);
        $formatter->format('XX', '');
    }

    /**
     * @dataProvider providerFormatInvalidPostcode
     *
     * @param string $country
     * @param string $postcode
     *
     * @return void
     */
    public function testFormatInvalidPostcode(string $country, string $postcode) : void
    {
        $formatter = new PostcodeFormatter();

        $this->expectException(InvalidPostcodeException::class);
        $formatter->format($country, $postcode);
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

        $this->assertSame($expectedOutput, $formatter->format($country, $postcode));
    }

    /**
     * @return array
     */
    public function providerFormat() : array
    {
        return [
            ['GB', 'WC2E9RZ', 'WC2E 9RZ'],
            ['gb', 'wc-2E9RZ', 'WC2E 9RZ'],
            ['PL', '12345', '12-345']
        ];
    }

    /**
     * @dataProvider providerIsSupportedCountry
     *
     * @param string $country
     * @param bool   $isSupported
     *
     * @return void
     */
    public function testIsSupportedCountry(string $country, bool $isSupported) : void
    {
        $formatter = new PostcodeFormatter();
        $this->assertSame($isSupported, $formatter->isSupportedCountry($country));
    }

    /**
     * @return array
     */
    public function providerIsSupportedCountry() : array
    {
        return [
            ['fr', true],
            ['GB', true],
            ['XX', false],
            ['UnknownCountry', false],
        ];
    }
}