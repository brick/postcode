<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Czechia.
 *
 * Postcodes consist of 5 digits in the following format: xxx xx.
 *
 * - The first digit (ranging from 1-7) represents the postal district.
 * - The second digit represents a further geographical division of this
 *   district.
 * - The third and, if necessary, other digits are used to distinguish
 *   the post office and eventually post office boxes.
 */
class CZ implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (! ctype_digit($postcode)) {
            return null;
        }

        if (strlen($postcode) !== 5) {
            return null;
        }

        $district = $postcode[0];

        if ($district < '1' || $district > '7') {
            return null;
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
