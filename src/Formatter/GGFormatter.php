<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Override;

use function preg_match;

/**
 * Validates and formats the postcodes in Guernsey.
 *
 * Postcodes can have two different formats:
 *
 * - AAN NAA
 * - AANN NAA
 *
 * A stands for a capital letter, N stands for a digit.
 * The first two letters are always GY.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/GY_postcode_area
 */
final class GGFormatter implements CountryPostcodeFormatter
{
    #[Override]
    public function format(string $postcode): ?string
    {
        if (preg_match('/^(GY[0-9]{1,2})([0-9][A-Z][A-Z])$/', $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
