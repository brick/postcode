<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Iran.
 *
 * Postcode format is NNNNN NNNNN, where N stands for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class IRFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 10) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return substr($postcode, 0, 5) . ' ' . substr($postcode, 5);
    }
}
