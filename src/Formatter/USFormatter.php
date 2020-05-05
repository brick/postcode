<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in the United States of America.
 *
 * Postcodes in the USA are called ZIP codes.
 *
 * ZIP codes consist of 5 digits without separator.
 * ZIP+4 codes consist of 5 digits, followed by a dash, followed by 4 digits.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class USFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            return $postcode;
        }

        if ($length === 9) {
            return substr($postcode, 0, 5) . '-' . substr($postcode, -4);
        }

        return null;
    }
}
