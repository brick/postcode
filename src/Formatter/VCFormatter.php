<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Vincent and the Grenadines.
 *
 * The postcode format is VCNNNN, where N represents a digit.
 * This formatter accepts postcodes with and without the VC prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class VCFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (str_starts_with($postcode, 'VC')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return 'VC' . $postcode;
    }
}
