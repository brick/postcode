<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in British Virgin Islands.
 *
 * The postcode format is VG followed by 4 digits, specifically VG1110 through VG1160.
 * This formatter accepts inputs with and without the VG prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class VGFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'VG') {
            $postcode = substr($postcode, 2);
        }

        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        if ($postcode < '1110' || $postcode > '1160') {
            return null;
        }

        return 'VG' . $postcode;
    }
}
