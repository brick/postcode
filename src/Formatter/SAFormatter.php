<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Saudi Arabia.
 *
 * The postcode format is NNNNN for PO Boxes and NNNNN-NNNN for home delivery, N standing for a digit.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class SAFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
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
