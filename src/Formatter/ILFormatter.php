<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in Israel.
 *
 * Postcodes consist of 7 digits, without separator.
 * The country used 5 digit postcodes up to 2013. These postcodes are not supported by this formatter.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Israel
 */
final class ILFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{7}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
