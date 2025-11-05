<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;

/**
 * Validates and formats postcodes in Belarus.
 *
 * Postal codes in Belarus are 6 digit numeric.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class BYFormatter implements CountryPostcodeFormatter
{
    public function hint(): string
    {
        return 'Postal codes in Belarus are 6 digit numeric.';
    }

    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{6}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
