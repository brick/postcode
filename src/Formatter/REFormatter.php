<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the island of Réunion.
 *
 * Postcodes consist of 5 digits, starting with 974, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class REFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
            return null;
        }

        if (strlen($postcode) !== 5) {
            return null;
        }

        if (substr($postcode, 0, 3) !== '974') {
            return null;
        }

        return $postcode;
    }
}
