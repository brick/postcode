<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Uzbekistan.
 *
 * Postal codes in Uzbekistan are 6 digit numeric.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class UZFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
