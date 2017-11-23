<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the island of Réunion.
 *
 * Postcodes consist of 5 digits, starting with 974, without separator.
 */
class REFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode) || strlen($postcode) !== 5 || substr($postcode, 0, 3) !== '974') {
            return null;
        }

        return $postcode;
    }
}
