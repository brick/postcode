<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Australia.
 *
 * Postcodes consist of 4 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/Postcodes_in_Australia
 */
class AUFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
            return null;
        }

        if (strlen($postcode) !== 4) {
            return null;
        }

        return $postcode;
    }
}