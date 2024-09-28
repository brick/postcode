<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in France.
 *
 * Postcodes consist of 5 digits, without separator.
 *
 * First two digits indicate the department (region)
 * 01–95 for metropolitan areas
 * 96–98 for overseas territories
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_France
 */
class FRFormatter implements CountryPostcodeFormatter
{

    public function format(string $postcode) : ?string
    {

        if (preg_match('/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
