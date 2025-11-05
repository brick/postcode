<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;

/**
 * Validates and formats postcodes in Réunion.
 *
 * Postcodes consist of 5 digits, starting with 974, without separator.
 * This is a subset of France postcodes.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class REFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'Postcodes consist of 5 digits, starting with 974, without separator.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if (! str_starts_with($postcode, '974')) {
            return null;
        }

        return $postcode;
    }
}
