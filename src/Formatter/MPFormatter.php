<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Northern Mariana Islands.
 *
 * U.S. ZIP codes. Range 96950 - 96952.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_the_Northern_Mariana_Islands
 */
class MPFormatter implements CountryPostcodeFormatter
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
            $zip = $postcode;
        } elseif ($length === 9) {
            $zip = substr($postcode, 0, 5);
        } else {
            return null;
        }

        if ($zip < '96950' || $zip > '96952') {
            return null;
        }

        if ($length === 5) {
            return $postcode;
        }

        return $zip . '-' . substr($postcode, 5);
    }
}
