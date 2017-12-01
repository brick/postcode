<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Swaziland.
 *
 * Postcode format is ANNN, A standing for a letter and N for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class SZFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[A-Z][0-9]{3}$/', $postcode, $matches) !== 1) {
            return null;
        }

        return $postcode;
    }
}
