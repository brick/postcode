<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the Republic of Macedonia.
 *
 * Postal codes in the Republic of Macedonia are 4 digits in length.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_the_Republic_of_Macedonia
 */
final class MKFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
