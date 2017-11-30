<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Malta.
 *
 * Postcode format is AAA NNNN, A standing for a letter and N standing for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Malta
 */
class MTFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^([A-Z]{3})([0-9]{4})$/', $postcode, $matches) !== 1) {
            return null;
        }

        return $matches[1] . ' ' . $matches[2];
    }
}
