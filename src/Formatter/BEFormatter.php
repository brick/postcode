<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;
use Brick\Postcode\FormatHelper\StripPrefix;

/**
 * Validates and formats postcodes in Belgium.
 *
 * Postcodes consist of 4 digits, without separator.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Belgium
 */
class BEFormatter implements CountryPostcodeFormatter
{
    use StripPrefix;

    public function format(string $postcode) : ?string
    {
        $postcode = $this->stripPrefix($postcode, 'B');

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        return $postcode;
    }
}
