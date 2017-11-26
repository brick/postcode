<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Faroe Islands.
 *
 * Postcodes consist of 3 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class FOFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 3) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return $postcode;
    }
}
