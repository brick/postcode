<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in U.S. Virgin Islands.
 *
 * U.S. ZIP codes. Range 00801 - 00851.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
final class VIFormatter implements CountryPostcodeFormatter
{
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]+$/', $postcode) !== 1) {
            return null;
        }

        $length = strlen($postcode);

        if ($length === 5) {
            $zip = $postcode;
        } elseif ($length === 9) {
            $zip = substr($postcode, 0, 5);
        } else {
            return null;
        }

        if ($zip < '00801' || $zip > '00851') {
            return null;
        }

        if ($length === 5) {
            return $postcode;
        }

        return $zip . '-' . substr($postcode, 5);
    }
}
