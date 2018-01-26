<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Afghanistan.
 *
 * Postcodes consist of 4 digits, without separator.
 *
 * The first two digits (ranging from 10–43) correspond to the province,
 * while the last two digits correspond either to the city/delivery zone (range 01–50)
 * or to the district/delivery zone (range 51–99).
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Afghanistan
 */
class AFFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (strlen($postcode) !== 4) {
            return null;
        }

        if (! ctype_digit($postcode)) {
            return null;
        }

        $province = substr($postcode, 0, 2);

        if ($province < '10' || $province > '43') {
            return null;
        }

        return $postcode;
    }
}
