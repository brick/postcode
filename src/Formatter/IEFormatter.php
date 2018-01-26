<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats the postcodes in the Republic of Ireland.
 *
 * Postcodes can have six different formats:
 *
 * - ANN ANAN
 * - ANN AANN
 * - ANN ANAA
 * - ANW ANAN
 * - ANW AANN
 * - ANW ANAA
 *
 * A stands for a capital letter, N stands for a digit, W is the letter W.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_addresses_in_the_Republic_of_Ireland
 */
class IEFormatter implements CountryPostcodeFormatter
{
    /**
     * The regular expression pattern used to validate the postcode and extract the two parts.
     */
    private const PATTERN = '/^'
    . '([A-Z][0-9][0-9W])'
    . '('
    . '(?:[A-Z][0-9][A-Z][0-9])|'
    . '(?:[A-Z][A-Z][0-9][0-9])|'
    . '(?:[A-Z][0-9][A-Z][A-Z])'
    . ')'
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
