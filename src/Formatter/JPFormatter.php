<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Japan.
 *
 * Postcodes format is NNN-NNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Japan
 */
class JPFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 7) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return substr($postcode, 0, 3) . '-' . substr($postcode, 3);
    }
}
