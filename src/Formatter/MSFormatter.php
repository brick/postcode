<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;
use function substr;

/**
 * Validates and formats postcodes in Montserrat.
 *
 * The format is MSR followed by a space then 4 digits, in the range 1110 to 1350.
 *
 * This formatter accepts the postcode both with and without the MSR prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class MSFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'The format is MSR followed by a space then 4 digits, in the range 1110 to 1350.';
    }

    public function format(string $postcode): ?string
    {
        if (str_starts_with($postcode, 'MSR')) {
            $postcode = substr($postcode, 3);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '1110' || $postcode > '1350') {
            return null;
        }

        return 'MSR ' . $postcode;
    }
}
