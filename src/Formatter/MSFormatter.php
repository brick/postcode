<?php

declare(strict_types=1);

namespace Brick\Postcode\Formatter;

use Brick\Postcode\CountryPostcodeFormatter;

/**
 * Validates and formats postcodes in Montserrat.
 *
 * The format is MSR followed by a space then 4 digits, in the range 1110 to 1350.
 *
 * This formatter accepts the postcode both with and without the MSR prefix, and always outputs the prefix.
 *
 * @see https://en.wikipedia.org/wiki/List_of_postal_codes
 */
class MSFormatter implements CountryPostcodeFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(string $postcode) : ?string
    {
        if (substr($postcode, 0, 3) === 'MSR') {
            $postcode = substr($postcode, 3);
        }

        if (preg_match('/^[0-9]{4}$/', $postcode) !== 1) {
            return null;
        }

        if ($postcode < '1110' || $postcode > '1350') {
            return null;
        }

        return 'MSR ' . $postcode;
    }
}
