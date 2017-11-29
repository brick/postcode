<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Jordan.
 *
 * Postcodes consist of 5 digits, without separator.
 * According to Wikipedia, postcodes are used for deliveries to PO Boxes only.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class JOFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 5) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        return $postcode;
    }
}
