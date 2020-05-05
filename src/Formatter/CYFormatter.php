<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Cyprus.
 *
 * Postcodes consist of 4 digits, without separator.
 * The postal code system covers the whole island, but is not used on mail to Northern Cyprus.
 * Northern Cyprus uses a 5-digit code commencing 99, introduced in 2013.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Cyprus
 */
class CYFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 4) {
            return $postcode;
        }

        if (strlen($postcode) !== 5) {
            return null;
        }

        if (substr($postcode, 0, 2) !== '99') {
            return null;
        }

        return $postcode;
    }
}
