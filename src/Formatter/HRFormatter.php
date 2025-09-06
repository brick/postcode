<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in Croatia.
 *
 * Postal codes in Croatia are 5 digit numeric.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Croatia
 */
final class HRFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
