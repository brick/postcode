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
final class AXFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        $length = strlen($postcode);
        $prefix = false;

        if ($length === 7) {
            if (!str_starts_with($postcode, 'AX')) {
                return null;
            }

            $postcode = substr($postcode, 2);
            $prefix = true;
        } elseif (strlen($postcode) !== 5) {
            return null;
        }

        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        if (!str_starts_with($postcode, '22')) {
            return null;
        }

        if ($prefix) {
            return 'AX-' . $postcode;
        }

        return $postcode;
    }
}
