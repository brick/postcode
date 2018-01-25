<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in American Samoa.
 *
 * Mail service in American Samoa is fully integrated with the United States Postal Service.
 * All points in the territory use the same ZIP code, 96799.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_American_Samoa
 */
class ASFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        $length = strlen($postcode);

        if ($length === 5) {
            if ($postcode !== '96799') {
                return null;
            }

            return $postcode;
        }

        if ($length !== 9) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        $zip = substr($postcode, 0, 5);

        if ($zip !== '96799') {
            return null;
        }

        $plusFour = substr($postcode, 5);

        return $zip . '-' . $plusFour;
    }
}
