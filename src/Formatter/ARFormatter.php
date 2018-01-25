<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Argentina.
 *
 * The postcode is either 4 digits, or 1 letter + 4 digits + 3 letters, with no separators.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Argentina
 */
class ARFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^(([0-9]{4})|([A-Z][0-9]{4}[A-Z]{3}))$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
