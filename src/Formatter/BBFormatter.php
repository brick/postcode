<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Barbados.
 *
 * Postal codes in Barbados are 5 digit numeric, with BB prefix.
 * This formatter accepts postcodes with and without the BB prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Barbados
 */
class BBFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'BB') {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        return 'BB' . $postcode;
    }
}
