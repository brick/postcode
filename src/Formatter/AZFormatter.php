<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;
use function substr;

/**
 * Validates and formats postcodes in Azerbaijan.
 *
 * The postcode format is AZ NNNN, where N represents a digit.
 * This formatter accepts postcodes with and without the AZ prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Azerbaijan
 */
final class AZFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): ?string
    {
        if (str_starts_with($postcode, 'AZ')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return 'AZ ' . $postcode;
    }
}
