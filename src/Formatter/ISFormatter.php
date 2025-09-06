<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in Iceland.
 *
 * Postcodes consist of 3 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes_in_Iceland
 */
final class ISFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode[0] === '0') {
            return null;
        }

        return $postcode;
    }
}
