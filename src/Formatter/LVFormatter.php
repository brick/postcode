<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Latvia.
 *
 * Postal codes in Latvia are 4 digit numeric and use a mandatory country code (LV) in front.
 * The format is LV-NNNN, where N stands for a digit.
 *
 * This formatter accepts the postcode both with and without the LV prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Latvia
 */
class LVFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'LV') {
            $postcode = substr($postcode, 2);
        }

        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return 'LV-' . $postcode;
    }
}
