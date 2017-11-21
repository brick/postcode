<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in France.
 *
 * Postcodes consist of 5 digits, without separator.
 */
class FR implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode) || strlen($postcode) !== 5) {
            return null;
        }

        return $postcode;
    }
}
