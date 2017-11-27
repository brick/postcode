<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Indonesia.
 *
 * Postcodes consist of 5 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Indonesia
 */
class IDFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 5) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        if ($postcode[0] === '0') {
            return null;
        }

        return $postcode;
    }
}
