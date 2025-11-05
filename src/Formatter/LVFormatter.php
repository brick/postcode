<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;
use function substr;

/**
 * Validates and formats postcodes in Latvia.
 *
 * Postal codes in Latvia are 4 digit numeric and use a mandatory country code (LV) in front.
 * The format is LV-NNNN, where N stands for a digit.
 *
 * This formatter accepts the postcode both with and without the LV prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Latvia
 */
final class LVFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'Postal codes in Latvia are 4 digit numeric and use a mandatory country code (LV) in front.';
    }

    public function format(string $postcode): ?string
    {
        if (str_starts_with($postcode, 'LV')) {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return 'LV-' . $postcode;
    }
}
