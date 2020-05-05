<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Andorra.
 *
 * Postcodes consist of the letters AD, followed by 3 digits, without separator.
 * This formatter accepts the 3 digits with and without the AD prefix, and always outputs with the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 * @see https://en.wikipedia.org/wiki/Postal_codes_in_Andorra
 */
class ADFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 2) === 'AD') {
            $postcode = substr($postcode, 2);
        }

        if (preg_match('/^[0-9]{3}$/', $postcode) !== 1) {
            return null;
        }

        return 'AD' . $postcode;
    }
}
