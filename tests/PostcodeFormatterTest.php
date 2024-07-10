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
    /**
     * @throws InvalidPostcodeException
     */
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
     * @throws UnknownCountryException
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
            ['AT', 'T-8084'],
            ['BE', 'E-1245'],
            ['LU', 'X2556'],
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
     * @throws InvalidPostcodeException
     * @throws UnknownCountryException
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
            ['PL', '12345', '12-345'],
            ['AT', 'A-8084', '8084'],
            ['BE', 'B-1245', '1245'],
            ['LU', 'L2556', '2556'],
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
