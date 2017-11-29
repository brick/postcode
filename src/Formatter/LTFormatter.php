<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Lithuania.
 *
 * Postal codes in Lithuania since 2005 are 5 digit numeric.
 * ISO 3166-1 alpha-2 prefix is allowed, with that the format is LT-NNNNN.
 *
 * This formatter accepts inputs both with and without the LT prefix,
 * and outputs the prefix only if present in the input.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Lithuania
 */
class LTFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        $length = strlen($postcode);
        $prefix = false;

        if ($length === 7) {
            if (substr($postcode, 0, 2) !== 'LT') {
                return null;
            }

            $postcode = substr($postcode, 2);
            $prefix = true;
        } elseif (strlen($postcode) !== 5) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        if ($prefix) {
            return 'LT-' . $postcode;
        }

        return $postcode;
    }
}
