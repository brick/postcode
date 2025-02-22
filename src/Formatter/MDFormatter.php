<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Moldova.
 *
 * The postcode format is MD-NNNN, where N stands for a digit.
 *
 * This formatter accepts the postcode both with and without the MD prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Moldova
 */
final class MDFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (str_starts_with($postcode, 'MD')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return 'MD-' . $postcode;
    }
}
