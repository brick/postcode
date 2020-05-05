<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Mayotte.
 *
 * Postcodes consist of 5 digits, without separator.
 * Overseas Department of France. French codes used. Range 97600 - 97690.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class YTFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '97600' || $postcode > '97690') {
            return null;
        }

        return $postcode;
    }
}
