<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saint Lucia.
 *
 * The postcode format is LCNN NNN, N standing for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class LCFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^(LC[0-9]{2})([0-9]{3})$/', $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
