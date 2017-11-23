<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Andorra.
 *
 * Postcodes consist of the letters AD, followed by 3 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Andorra
 */
class ADFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 5) {
            return null;
        }

        if (substr($postcode, 0, 2) !== 'AD') {
            return null;
        }

        if (! ctype_digit(substr($postcode, 2))) {
            return null;
        }

        return $postcode;
    }
}
