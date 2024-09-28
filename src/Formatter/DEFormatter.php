<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Germany.
 *
 * Postcodes consist of 5 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Germany
 */
class DEFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {

        if (preg_match('/^((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:4[0-24-9]\d{3})|(?:6[013-9]\d{3}))$/', $postcode) !== 1) {

            return null;
        }

        return $postcode;
    }
}
