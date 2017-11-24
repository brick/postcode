<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Chile.
 *
 * Postcodes consist of 7 digits, without separator.
 * According to Wikipedia, postal codes are rarely included in addresses.
 *
 * https://en.wikipedia.org/wiki/Postal_codes_in_Chile
 */
class CLFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
            return null;
        }

        if (strlen($postcode) !== 7) {
            return null;
        }

        return $postcode;
    }
}
