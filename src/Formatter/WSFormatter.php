<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Samoa.
 *
 * The postcode format is WSNNNN, where N represents a digit.
 * This formatter accepts postcodes with and without the WS prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class WSFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'WS') {
            $postcode = substr($postcode, 2);
        }

        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return 'WS' . $postcode;
    }
}
