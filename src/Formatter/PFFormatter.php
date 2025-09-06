<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

use function preg_match;
use function str_starts_with;

/**
 * Validates and formats postcodes in French Polynesia.
 *
 * Postcode format is 987NN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class PFFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode): ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if (! str_starts_with($postcode, '987')) {
            return null;
        }

        return $postcode;
    }
}
