<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Åland Islands.
 *
 * Postcodes consist of 5 digits, starting with 22.
 * Postcodes may optionally start with "AX-" when used from abroad.
 * This formatter only outputs the prefix if present in the input.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class AXFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        $length = strlen($postcode);
        $prefix = false;

        if ($length === 7) {
            if (substr($postcode, 0, 2) !== 'AX') {
                return null;
            }

            $postcode = substr($postcode, 2);
            $prefix = true;
        } elseif (strlen($postcode) !== 5) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        if (substr($postcode, 0, 2) !== '22') {
            return null;
        }

        if ($prefix) {
            return 'AX-' . $postcode;
        }

        return $postcode;
    }
}
