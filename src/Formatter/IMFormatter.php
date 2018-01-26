<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats the postcodes in the Isle of Man.
 *
 * Postcodes can have two different formats:
 *
 * - IM9 9AA
 * - IM99 9AA
 *
 * A stands for a capital letter, 9 stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/IM_postcode_area
 */
class IMFormatter implements CountryPostcodeFormatter
{
    /**
     * The regular expression pattern used to validate the postcode and extract the two parts.
     */
    private const PATTERN
        = '/^'
        . '(IM[0-9][0-9]?)'
        . '([0-9][A-Z][A-Z])'
        . '$/';

    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match(self::PATTERN, $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
