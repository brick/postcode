<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Ethiopia.
 *
 * Postcodes consist of 4 digits, without separator.
 * According to Wikipedia, the code is only used on a trial basis for Addis Ababa addresses.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class ETFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return $postcode;
    }
}
