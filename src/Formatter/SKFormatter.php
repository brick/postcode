<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Slovakia.
 *
 * Postcodes consist of 5 digits in the following format: xxx xx.
 *
 * - The first digit represents the postal district and is either 8, 9, or 0.
 * - Other digits, depending on the district, represent further geographical
 *   division of this district.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class SKFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^[0-9]{5}$/', $postcode) !== 1) {
            return null;
        }

        $district = $postcode[0];

        if (! in_array($district, ['8', '9', '0'], true)) {
            return null;
        }

        return substr($postcode, 0, 3) . ' ' . substr($postcode, 3);
    }
}
