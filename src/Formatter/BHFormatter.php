<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Bahrain.
 *
 * Valid post code numbers are 101 to 1216 with gaps in the range. Known as block number formally.
 * The first 1 or 2 digits refer to one of the 12 municipalities of the country.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class BHFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (preg_match('/^(1?[0-9])([0-9]{2})$/', $postcode, $matches) !== 1) {
            return null;
        }

        $municipality = (int) $matches[1];

        if ($municipality < 1 || $municipality > 12) {
            return null;
        }

        if ($matches[2] === '00') {
            return null;
        }

        return $postcode;
    }
}
