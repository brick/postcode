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
     * @param bool   $cleanup
     * @param bool   $isValid
     *
     * @return void
     */
    public function testIsValid(string $country, string $postcode, bool $cleanup, bool $isValid) : void
    {
        $formatter = new PostcodeFormatter($cleanup);

        $this->assertSame($isValid, $formatter->isValidPostcode($country, $postcode));
    }

    /**
     * @return array
     */
    public function providerIsValid() : array
    {
        return [
            ['GB', '', false, false],
            ['GB', '', true, false],
            ['GB', 'WC2E9RZ', false, true],
            ['GB', 'WC2E9RZ', true, true],
            ['GB', ' - WC 2E - 9RZ - ', false, false],
            ['GB', ' - WC 2E - 9RZ - ', true, true],
            ['PL', '', false, false],
            ['PL', '', true, false],
            ['PL', '12345', false, true],
            ['PL', '12345', true, true],
            ['PL', '*12*345*', false, false],
            ['PL', '*12*345*', true, true],
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
        $formatter = new PostcodeFormatter(true);

        $this->assertSame($expectedOutput, $formatter->formatPostcode($country, $postcode));
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
