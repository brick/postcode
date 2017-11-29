<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the Republic of Macedonia.
 *
 * Postal codes in the Republic of Macedonia are 4 digits in length.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_the_Republic_of_Macedonia
 */
class MKFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return $postcode;
    }
}
